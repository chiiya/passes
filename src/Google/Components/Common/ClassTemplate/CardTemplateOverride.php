<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\MaxItems;
use Chiiya\Passes\Common\Validation\Required;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CardTemplateOverride extends Component
{
    /**
     * Required.
     *
     * @var FieldReference[]
     */
    #[CastWith(ArrayCaster::class, CardRowTemplateInfo::class)]
    #[Required]
    #[MaxItems(2)]
    public array $cardRowTemplateInfos = [];
}
