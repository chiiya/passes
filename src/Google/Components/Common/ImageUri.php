<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;

class ImageUri extends Component
{
    public function __construct(
        #[NotBlank]
        public string $uri,
    ) {
        parent::__construct();
    }
}
