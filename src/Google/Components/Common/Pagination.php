<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Common;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

class Pagination extends Component
{
    /**
     * Required.
     * Number of results returned in this page.
     */
    #[Required]
    public ?int $resultsPerPage;

    /**
     * Optional.
     * Page token to send to fetch the next page.
     */
    public ?string $nextPageToken;
}
