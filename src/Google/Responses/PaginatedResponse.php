<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Pagination;

class PaginatedResponse extends Component
{
    public function __construct(
        public Pagination $pagination,
    ) {
        parent::__construct();
    }
}
