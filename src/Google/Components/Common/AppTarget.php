<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class AppTarget extends Component
{
    public function __construct(
        /** Optional. */
        public ?Uri $targetUri = null,
    ) {
        parent::__construct();
    }
}
