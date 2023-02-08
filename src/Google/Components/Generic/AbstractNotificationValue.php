<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Generic;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

abstract class AbstractNotificationValue extends Component
{
    /**
     * Required.
     * Indicates that the issuer would like GooglePay to send notifications.
     */
    #[Required]
    public ?bool $enableNotification;
}
