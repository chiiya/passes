<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

class CardTemplateOverride extends Component
{
    public function __construct(
        /**
         * Required.
         *
         * @var FieldReference[]
         */
        #[Cast(ArrayCaster::class, CardRowTemplateInfo::class)]
        #[NotBlank]
        #[Count(max: 2)]
        public array $cardRowTemplateInfos = [],
    ) {
        parent::__construct();
    }
}
