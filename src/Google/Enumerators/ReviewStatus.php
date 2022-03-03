<?php

namespace Chiiya\Passes\Google\Enumerators;

use Chiiya\Passes\Common\LegacyValueEnumerator;

final class ReviewStatus implements LegacyValueEnumerator
{
    public const REVIEW_STATUS_UNSPECIFIED = 'REVIEW_STATUS_UNSPECIFIED';

    public const UNDER_REVIEW = 'UNDER_REVIEW';

    public const APPROVED = 'APPROVED';

    public const REJECTED = 'REJECTED';

    public const DRAFT = 'DRAFT';

    public function mapLegacyValues(string $value): string
    {
        return str_replace([
            'underReview',
            'approved',
            'rejected',
            'draft',
        ], [self::UNDER_REVIEW, self::APPROVED, self::REJECTED, self::DRAFT], $value);
    }

    public static function values(): array
    {
        return [self::REVIEW_STATUS_UNSPECIFIED, self::UNDER_REVIEW, self::APPROVED, self::REJECTED, self::DRAFT];
    }
}
