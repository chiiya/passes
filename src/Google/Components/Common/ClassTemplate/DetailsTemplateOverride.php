<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class DetailsTemplateOverride extends Component
{
    /**
     * Required.
     * Information for the "nth" item displayed in the details list.
     *
     * @var FieldReference[]
     */
    #[CastWith(ArrayCaster::class, DetailsItemInfo::class)]
    #[Required]
    public array $detailsItemInfos = [];
}
