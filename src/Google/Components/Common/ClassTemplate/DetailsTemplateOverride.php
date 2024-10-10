<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class DetailsTemplateOverride extends Component
{
    public function __construct(
        /**
         * Required.
         * Information for the "nth" item displayed in the details list.
         *
         * @var FieldReference[]
         */
        #[Cast(ArrayCaster::class, DetailsItemInfo::class)]
        #[NotBlank]
        public array $detailsItemInfos = [],
    ) {
        parent::__construct();
    }
}
