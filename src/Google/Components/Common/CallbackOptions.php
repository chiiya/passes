<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Url;

class CallbackOptions extends Component
{
    public function __construct(
        /**
         * Required.
         * The HTTPS url configured by the merchant. The URL should be hosted on HTTPS and robots.txt should allow
         * the URL path to be accessible by UserAgent:Google-Valuables.
         */
        #[NotBlank]
        #[Url]
        public string $url,
        /**
         * Optional.
         * URL for the merchant endpoint that would be called to request updates. The URL should be hosted on HTTPS
         * and robots.txt should allow the URL path to be accessible by UserAgent:Google-Valuables.
         */
        #[Url]
        public ?string $updateRequestUrl = null,
    ) {
        parent::__construct();
    }
}
