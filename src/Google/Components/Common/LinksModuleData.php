<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;

class LinksModuleData extends Component
{
    public function __construct(
        /**
         * The list of URIs.
         *
         * @var Uri[]
         */
        #[Cast(ArrayCaster::class, Uri::class)]
        public array $uris = [],
    ) {
        parent::__construct();
    }
}
