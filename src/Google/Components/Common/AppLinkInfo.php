<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class AppLinkInfo extends Component
{
    public function __construct(
        /**
         * Required.
         * String to be displayed in the title of the App Link Module.
         */
        public LocalizedString $title,
        /**
         * Required.
         * String to be displayed in the description of the App Link Module.
         */
        public LocalizedString $description,
        /**
         * Optional.
         * Optional image to be displayed in the App Link Module.
         */
        public ?Image $appLogoImage = null,
        /**
         * Optional.
         * Url to follow when opening the App Link Module on clients. It will be used by partners to open their
         * webpage or deeplink into their app.
         */
        public ?AppTarget $appTarget = null,
    ) {
        parent::__construct();
    }
}
