<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;

class Pagination extends Component
{
    public function __construct(
        /**
         * Required.
         * Number of results returned in this page.
         */
        public int $resultsPerPage,
        /**
         * Optional.
         * Page token to send to fetch the next page.
         */
        public ?string $nextPageToken = null,
    ) {
        parent::__construct();
    }
}
