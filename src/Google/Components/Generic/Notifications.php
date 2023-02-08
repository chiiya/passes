<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Generic;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Common\Validation\Required;

/**
 * Indicates if the object needs to have notification enabled.
 * We support only one of ExpiryNotification/UpcomingNotification.
 * expiryNotification takes precedence over upcomingNotification.
 * In other words if expiryNotification is set, we ignore the upcomingNotification field.
 */
class Notifications extends Component
{
    #[Required]
    public ?ExpiryNotification $expiryNotification;

    #[Required]
    public ?UpcomingNotification $upcomingNotification;
}
