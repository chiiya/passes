<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Enumerators;

final class EventType
{
    /** @var string */
    public const GENERIC = 'PKEventTypeGeneric';

    /** @var string */
    public const LIVE_PERFORMANCE = 'PKEventTypeLivePerformance';

    /** @var string */
    public const MOVIE = 'PKEventTypeMovie';

    /** @var string */
    public const SPORTS = 'PKEventTypeSports';

    /** @var string */
    public const CONFERENCE = 'PKEventTypeConference';

    /** @var string */
    public const CONVENTION = 'PKEventTypeConvention';

    /** @var string */
    public const WORKSHOP = 'PKEventTypeWorkshop';

    /** @var string */
    public const SOCIAL_GATHERING = 'PKEventTypeSocialGathering';
}
