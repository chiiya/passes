<?php

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class ImageUri extends Component
{
    #[Required]
    public ?string $uri;
}
