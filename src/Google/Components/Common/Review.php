<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class Review extends Component
{
    public function __construct(
        /** The review comments. */
        public ?string $comments = null,
    ) {
        parent::__construct();
    }
}
