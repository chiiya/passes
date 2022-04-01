<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Responses;

use Chiiya\Passes\Google\Components\Common\Pagination;

trait HasPagination
{
    public Pagination $pagination;
}
