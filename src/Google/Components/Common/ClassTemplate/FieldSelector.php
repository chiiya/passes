<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common\ClassTemplate;

use Antwerpes\DataTransferObject\Attributes\Cast;
use Antwerpes\DataTransferObject\Casts\ArrayCaster;
use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\NotBlank;

class FieldSelector extends Component
{
    public function __construct(
        /**
         * Required.
         * If more than one reference is supplied, then the first one that references a non-empty field will be displayed.
         *
         * @var FieldReference[]
         */
        #[Cast(ArrayCaster::class, FieldReference::class)]
        #[NotBlank]
        #[Count(min: 1)]
        public array $fields = [],
    ) {
        parent::__construct();
    }
}
