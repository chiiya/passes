<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class LinksModuleData extends Component
{
    /**
     * The list of URIs.
     *
     * @var Uri[]
     */
    #[CastWith(ArrayCaster::class, Uri::class)]
    public array $uris = [];
}
