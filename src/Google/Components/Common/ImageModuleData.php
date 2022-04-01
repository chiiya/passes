<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class ImageModuleData extends Component
{
    /**
     * Required.
     * A 100% width image.
     */
    #[Required]
    public ?Image $mainImage;

    /**
     * Optional.
     * The ID associated with an image module. This field is here to enable ease of management of image modules.
     */
    public ?string $id;
}
