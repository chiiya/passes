<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple;

use Chiiya\Passes\Apple\Components\Image;
use Chiiya\Passes\Apple\Enumerators\ImageType;
use Chiiya\Passes\Apple\Passes\BoardingPass;
use Chiiya\Passes\Apple\Passes\Coupon;
use Chiiya\Passes\Apple\Passes\EventTicket;
use Chiiya\Passes\Apple\Passes\GenericPass;
use Chiiya\Passes\Apple\Passes\Pass;
use Chiiya\Passes\Apple\Passes\StoreCard;
use Chiiya\Passes\Exceptions\ValidationException;
use FilesystemIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use SplFileInfo;
use Throwable;
use ZipArchive;

class PassFactory
{
    /**
     * Pass file extension.
     *
     * @var string
     */
    final public const PASS_EXTENSION = '.pkpass';

    /**
     * Localization directory extension.
     *
     * @var string
     */
    final public const LOCALIZATION_EXTENSION = '.lproj';

    /**
     * Localization strings file name.
     *
     * @var string
     */
    final public const STRINGS_FILENAME = 'pass.strings';

    /**
     * Manifest file name.
     *
     * @var string
     */
    final public const MANIFEST_FILENAME = 'manifest.json';

    /** Temporary directory for creating the archive. */
    protected string $tempDir;

    /** The output path. */
    protected ?string $output = null;

    /** Path to the P12 certificate file. */
    protected ?string $certificate = null;

    /** Password for the P12 certificate file. */
    protected ?string $password = null;

    /** Path to the WWDR certificate file. */
    protected ?string $wwdr = null;

    /** Skip signing the .pkpass package. */
    protected bool $skipSignature = false;

    /** Allowed images for each pass type. */
    protected array $allowedImages = [
        BoardingPass::class => [ImageType::LOGO, ImageType::ICON, ImageType::FOOTER],
        Coupon::class => [ImageType::LOGO, ImageType::ICON, ImageType::STRIP],
        EventTicket::class => [
            ImageType::LOGO,
            ImageType::ICON,
            ImageType::STRIP,
            ImageType::BACKGROUND,
            ImageType::THUMBNAIL,
        ],
        GenericPass::class => [ImageType::LOGO, ImageType::ICON, ImageType::THUMBNAIL],
        StoreCard::class => [ImageType::LOGO, ImageType::ICON, ImageType::STRIP],
    ];

    public function __construct(array $config = [])
    {
        $this->tempDir = isset($config['temp_dir'])
            ? rtrim($config['temp_dir'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR
            : sys_get_temp_dir().DIRECTORY_SEPARATOR;

        if (isset($config['output'])) {
            $this->setOutput($config['output']);
        }

        if (isset($config['certificate'])) {
            $this->setCertificate($config['certificate']);
        }

        if (isset($config['password'])) {
            $this->setPassword($config['password']);
        }

        if (isset($config['wwdr'])) {
            $this->setWwdr($config['wwdr']);
        }
    }

    public function setTempDir(string $tempDir): self
    {
        $this->tempDir = rtrim($tempDir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

        return $this;
    }

    public function setOutput(string $output): self
    {
        $this->output = rtrim($output, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

        return $this;
    }

    public function setCertificate(string $certificate): self
    {
        $this->certificate = $certificate;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setWwdr(string $wwdr): self
    {
        $this->wwdr = $wwdr;

        return $this;
    }

    public function setSkipSignature(bool $skipSignature): self
    {
        $this->skipSignature = $skipSignature;

        return $this;
    }

    /**
     * Create and archive the .pkpass file.
     */
    public function create(Pass $pass, ?string $name = null): SplFileInfo
    {
        $this->validate($pass);
        $dir = $this->createTempDirectory($pass);
        $this->serializePass($pass, $dir);
        $this->copyImages($pass, $dir);
        $this->createLocalizations($pass, $dir);
        $this->createManifest($dir);
        $this->sign($dir);
        $filename = $this->output.($name ?? $pass->serialNumber).self::PASS_EXTENSION;
        $this->zip($dir, $filename);
        $this->deleteDirectory($dir);

        return new SplFileInfo($filename);
    }

    /**
     * Recursively delete a directory.
     */
    public function deleteDirectory(string $directory): void
    {
        $items = new FilesystemIterator($directory);

        foreach ($items as $item) {
            if ($item->isDir() && ! $item->isLink()) {
                $this->deleteDirectory($item->getPathname());
            } else {
                $this->delete($item->getPathname());
            }
        }
        @rmdir($directory);
    }

    /**
     * Delete the file at a given path.
     */
    public function delete(string $path): void
    {
        @unlink($path);
    }

    /**
     * Validate the pass.
     */
    protected function validate(Pass $pass): void
    {
        $errors = $this->validateImages($pass);

        if (count($errors) > 0) {
            throw new ValidationException('Invalid pass', $errors);
        }
    }

    /**
     * Validate that all images are correct.
     */
    protected function validateImages(Pass $pass): array
    {
        $class = $pass::class;
        $hasIcon = false;
        $errors = [];

        foreach ($pass->getImages() as $image) {
            $name = $this->getImageName($image);

            if ($this->normalizeName($name) === 'icon') {
                $hasIcon = true;
            }

            if (mb_strtolower($image->getExtension()) !== 'png') {
                $errors[] = $image->getFilename().': expected .png extension, found .'.$image->getExtension();
            }

            if (! $this->isValidImage($name, $class)) {
                $errors[] = 'Invalid image type `'.$name.'` for pass type `'.$class.'`.';
            }
        }

        if ($pass instanceof EventTicket) {
            $errors = $this->validateEventTicket($pass, $errors);
        }

        if (! $hasIcon) {
            $errors[] = 'The pass must have an icon image.';
        }

        return $errors;
    }

    /**
     * For event tickets, a background or thumbnail image may only be specified when NO strip image
     * has been added.
     */
    protected function validateEventTicket(Pass $pass, array $errors): array
    {
        $hasStrip = count(
            array_filter($pass->getImages(), fn (Image $image) => $this->normalizeName(
                $this->getImageName($image),
            ) === ImageType::STRIP),
        ) > 0;
        $hasThumbnailOrBackground = count(array_filter($pass->getImages(), function (Image $image) {
            $name = $this->normalizeName($this->getImageName($image));

            return $name === ImageType::THUMBNAIL || $name === ImageType::BACKGROUND;
        })) > 0;

        if ($hasStrip && $hasThumbnailOrBackground) {
            $errors[] = 'When specifying a strip image, no background image or thumbnail may be specified.';
        }

        return $errors;
    }

    /**
     * Check whether a provided image is a valid asset for the given pass type.
     */
    protected function isValidImage(string $name, string $class): bool
    {
        $allowed = $this->allowedImages[$class] ?? [];

        return in_array($name, $allowed, true)
               || in_array($this->normalizeName($name), $allowed, true);
    }

    /**
     * Normalize the image name. For e.g. icons should be either `icon` or `icon@2x`.
     */
    protected function normalizeName(string $name): string
    {
        return str_replace(['@2x', '@3x'], '', $name);
    }

    /**
     * Create the temporary directory.
     */
    protected function createTempDirectory(Pass $pass): string
    {
        $dir = $this->tempDir.$pass->serialNumber.DIRECTORY_SEPARATOR;

        if (! is_dir($dir) && ! mkdir($dir, 0o755) && ! is_dir($dir)) {
            throw new RuntimeException(sprintf('Directory "%s" could not be created', $dir));
        }

        return $dir;
    }

    /**
     * Serialize the pass and create pass.json file.
     */
    protected function serializePass(Pass $pass, string $dir): void
    {
        file_put_contents($dir.'pass.json', json_encode($pass, JSON_PRETTY_PRINT));
    }

    /**
     * Copy all images into the temporary directory.
     */
    protected function copyImages(Pass $pass, string $dir): void
    {
        foreach ($pass->getImages() as $image) {
            $filename = $dir.$this->getImageName($image).'.'.$image->getExtension();
            copy($image->getPathname(), $filename);
        }
    }

    protected function getImageName(Image $image): string
    {
        if ($image->getName() !== null) {
            return $image->getScale() > 1
                ? $image->getName().'@'.$image->getScale().'x'
                : $image->getName();
        }

        return $image->getBasename('.'.$image->getExtension());
    }

    /**
     * Create directory and files for each localization entry.
     */
    protected function createLocalizations(Pass $pass, string $dir): void
    {
        foreach ($pass->getLocalizations() as $localization) {
            $localizationDir = $dir.$localization->language.self::LOCALIZATION_EXTENSION;

            if (! is_dir($localizationDir) && ! mkdir($localizationDir, 0o755) && ! is_dir($localizationDir)) {
                throw new RuntimeException(sprintf('Directory "%s" could not be created', $dir));
            }
            $strings = '';

            foreach ($localization->strings as $key => $value) {
                $strings .= '"'.addslashes($key).'" = "'.addslashes($value).'";'.PHP_EOL;
            }
            file_put_contents($localizationDir.self::STRINGS_FILENAME, $strings);

            foreach ($localization->images as $image) {
                $filename = $localizationDir.($image->getName() ?? $image->getFilename());
                copy($image->getPathname(), $filename);
            }
        }
    }

    /**
     * Create the manifest file.
     */
    protected function createManifest(string $dir): void
    {
        $manifest = [];
        $files = new FilesystemIterator($dir);

        /** @var SplFileInfo $file */
        foreach ($files as $file) {
            if ($file->isFile()) {
                $relative = str_replace($dir, '', $file->getPathname());
                $manifest[$relative] = sha1_file($file->getRealPath());
            }
        }
        file_put_contents($dir.self::MANIFEST_FILENAME, json_encode($manifest, JSON_PRETTY_PRINT));
    }

    /**
     * Sign the pass.
     */
    protected function sign(string $dir): void
    {
        if ($this->skipSignature) {
            return;
        }

        if (! ($p12 = file_get_contents($this->certificate))) {
            throw new RuntimeException(sprintf('The certificate at "%s" could not be read', $this->certificate));
        }

        if (! file_exists($this->wwdr)) {
            throw new RuntimeException(sprintf('The WWDR certificate at "%s" could not be read', $this->wwdr));
        }

        $certs = $this->openssl_pkcs12_read_wrapper($p12, $this->password);

        $certData = openssl_x509_read($certs['cert']);
        $privateKey = openssl_pkey_get_private($certs['pkey'], $this->password);
        $signatureFile = $dir.'signature';

        openssl_pkcs7_sign(
            $dir.self::MANIFEST_FILENAME,
            $signatureFile,
            $certData,
            $privateKey,
            [],
            PKCS7_BINARY | PKCS7_DETACHED,
            $this->wwdr,
        );

        $signature = file_get_contents($signatureFile);
        $signature = $this->convertPEMtoDER($signature);
        file_put_contents($signatureFile, $signature);
    }

    /**
     * Wrapper for the openssl_pkcs12_read function allowing for fallback to a shell_exec call
     * to work around a problem reading legacy p12 files in newer versions of PHP.
     * Adapted from an implementation in the php-pkpass project.
     *
     * @see https://github.com/includable/php-pkpass/issues/122
     */
    protected function openssl_pkcs12_read_wrapper(string $pkcs12, string $passphrase): array
    {
        $certs = [];

        // If the openssl_pkcs12_read function works ok, go with that
        if (openssl_pkcs12_read($pkcs12, $certs, $passphrase)) {
            return $certs;
        }

        // That failed, get error message
        $error = '';

        while ($text = openssl_error_string()) {
            $error .= $text;
        }

        // If an error occurred that wasn't due to a legacy p12 file, the workaround won't help, so give up now
        if (! str_contains($error, 'digital envelope routines::unsupported')) {
            throw new RuntimeException(
                sprintf('Invalid certificate file: "%s". Error: %s', $this->certificate, $error),
            );
        }

        // Try an alternative route using shell_exec to allow legacy support
        // Try the shell_exec method with and without the -legacy flag
        $commands = [
            'openssl pkcs12 -in '.escapeshellarg($this->certificate)
            .' -passin '.escapeshellarg('pass:'.$passphrase)
            .' -passout '.escapeshellarg('pass:'.$passphrase),
            'openssl pkcs12 -in '.escapeshellarg($this->certificate)
            .' -passin '.escapeshellarg('pass:'.$passphrase)
            .' -passout '.escapeshellarg('pass:'.$passphrase)
            .' -legacy',
        ];

        foreach ($commands as $command) {
            try {
                $value = @shell_exec($command);

                if ($value) {
                    $certMatches = [];
                    $keyMatches = [];

                    // Search separately so that they can appear in either order
                    if (
                        preg_match('/-----BEGIN CERTIFICATE-----.*-----END CERTIFICATE-----/s', $value, $certMatches)
                        && preg_match(
                            '/-----BEGIN ENCRYPTED PRIVATE KEY-----.*-----END ENCRYPTED PRIVATE KEY-----/s',
                            $value,
                            $keyMatches,
                        )
                    ) {
                        return ['cert' => $certMatches[0], 'pkey' => $keyMatches[0]];
                    }
                }
            } catch (Throwable) {
                // no need to do anything
            }
        }

        throw new RuntimeException(sprintf('Invalid certificate file: "%s". Error: %s', $this->certificate, $error));
    }

    /**
     * Converts PKCS7 PEM to PKCS7 DER
     * Parameter: string, holding PKCS7 PEM, binary, detached
     * Return: string, PKCS7 DER.
     */
    protected function convertPEMtoDER(string $signature): string
    {
        $begin = 'filename="smime.p7s"';
        $end = '------';
        $signature = mb_substr($signature, mb_strpos($signature, $begin) + mb_strlen($begin));
        $signature = mb_substr($signature, 0, mb_strpos($signature, $end));
        $signature = trim($signature);

        return base64_decode($signature, true);
    }

    /**
     * Create zip archive.
     */
    protected function zip(string $source, string $path): void
    {
        $zip = new ZipArchive;

        if (! $zip->open($path, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            throw new RuntimeException(sprintf('Could not create ZIP file at "%s"', $path));
        }

        /** @var RecursiveDirectoryIterator|RecursiveIteratorIterator $iterator */
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST,
        );

        while ($iterator->valid()) {
            if ($iterator->isDir()) {
                $zip->addEmptyDir($iterator->getSubPathname());
            } elseif ($iterator->isFile()) {
                $zip->addFromString($iterator->getSubPathname(), file_get_contents($iterator->key()));
            }
            $iterator->next();
        }

        $zip->close();
    }
}
