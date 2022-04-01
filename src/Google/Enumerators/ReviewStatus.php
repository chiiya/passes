<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ReviewStatus implements LegacyValueEnumerator
{
    /** @var string */
    public const REVIEW_STATUS_UNSPECIFIED = 'REVIEW_STATUS_UNSPECIFIED';

    /** @var string */
    public const UNDER_REVIEW = 'UNDER_REVIEW';

    /** @var string */
    public const APPROVED = 'APPROVED';

    /** @var string */
    public const REJECTED = 'REJECTED';

    /** @var string */
    public const DRAFT = 'DRAFT';

    public static function values(): array
    {
        return [self::REVIEW_STATUS_UNSPECIFIED, self::UNDER_REVIEW, self::APPROVED, self::REJECTED, self::DRAFT];
    }

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'underReview',
            'approved',
            'rejected',
            'draft',
        ], [self::UNDER_REVIEW, self::APPROVED, self::REJECTED, self::DRAFT], $value);
    }
}
