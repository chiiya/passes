<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Enumerators;

final class DataDetector
{
    /** @var string */
    public const PHONE_NUMBER = 'PKDataDetectorTypePhoneNumber';

    /** @var string */
    public const LINK = 'PKDataDetectorTypeLink';

    /** @var string */
    public const ADDRESS = 'PKDataDetectorTypeAddress';

    /** @var string */
    public const CALENDAR_EVENT = 'PKDataDetectorTypeCalendarEvent';
}
