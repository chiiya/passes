<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class ImageModuleData extends Component
{
    public function __construct(
        /**
         * Required.
         * A 100% width image.
         */
        #[NotBlank]
        public Image $mainImage,
        /**
         * Optional.
         * The ID associated with an image module. This field is here to enable ease of management of image modules.
         */
        public ?string $id = null,
    ) {
        parent::__construct();
    }
}
