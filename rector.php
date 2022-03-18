<?php declare(strict_types=1);

use Chiiya\CodeStyle\CodeStyle;
use Rector\Core\Configuration\Option;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);
    $parameters->set(Option::AUTO_IMPORT_NAMES, true);
    $containerConfigurator->import(CodeStyle::RECTOR);
};
