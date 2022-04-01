<?php declare(strict_types=1);

namespace Chiiya\Passes\Google;

use InvalidArgumentException;
use Spatie\DataTransferObject\DataTransferObject;

class ServiceCredentials extends DataTransferObject
{
    public string $client_id;
    public string $client_email;
    public string $private_key;

    public static function parse(string $path): static
    {
        if (! file_exists($path)) {
            throw new InvalidArgumentException(sprintf('Service account configuration file not found: %s', $path));
        }

        $config = json_decode(file_get_contents($path), true);

        return new static([
            'client_id' => $config['client_id'],
            'client_email' => $config['client_email'],
            'private_key' => $config['private_key'],
        ]);
    }
}
