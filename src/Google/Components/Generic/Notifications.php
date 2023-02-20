<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Components\Generic;

use Chiiya\Passes\Common\Component;

/**
 * Indicates if the object needs to have notification enabled.
 * We support only one of ExpiryNotification/UpcomingNotification.
 * expiryNotification takes precedence over upcomingNotification.
 * In other words if expiryNotification is set, we ignore the upcomingNotification field.
 */
class Notifications extends Component
{
    public ?ExpiryNotification $expiryNotification;
    public ?UpcomingNotification $upcomingNotification;
}
