<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Loyalty\DiscoverableProgram;
use Symfony\Component\Validator\Constraints\Length;

class LoyaltyClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'loyaltyClass';

    public function __construct(
        /**
         * Required.
         * The logo of the loyalty program or company. This logo is displayed in both the details and list
         * views of the app.
         */
        public Image $programLogo,
        /**
         * Required when creating.
         * The program name, such as "Adam's Apparel". The app may display an ellipsis after the first 20
         * characters to ensure full string is displayed on smaller screens.
         */
        public ?string $programName = null,
        /**
         * Optional.
         * The wide logo of the loyalty program or company. When provided, this will be used in place of the program logo in the top left of the card view.
         */
        public ?Image $wideProgramLogo = null,
        /**
         * Optional.
         * The account name label, such as "Member Name." Recommended maximum length is 15 characters to
         * ensure full string is displayed on smaller screens.
         */
        #[Length(max: 15)]
        public ?string $accountNameLabel = null,
        /**
         * Optional.
         * The account ID label, such as "Member ID." Recommended maximum length is 15 characters to ensure
         * full string is displayed on smaller screens.
         */
        #[Length(max: 15)]
        public ?string $accountIdLabel = null,
        /**
         * Optional.
         * The rewards tier label, such as "Rewards Tier." Recommended maximum length is 9 characters to ensure
         * full string is displayed on smaller screens.
         */
        #[Length(max: 9)]
        public ?string $rewardsTierLabel = null,
        /**
         * Optional.
         * The rewards tier, such as "Gold" or "Platinum." Recommended maximum length is 7 characters to ensure
         * full string is displayed on smaller screens.
         */
        #[Length(max: 7)]
        public ?string $rewardsTier = null,
        /**
         * Optional.
         * Translated strings for the programName. The app may display an ellipsis after the first 20 characters
         * to ensure full string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedProgramName = null,
        /**
         * Optional.
         * Translated strings for the accountNameLabel. Recommended maximum length is 15 characters to ensure
         * full string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedAccountNameLabel = null,
        /**
         * Optional.
         * Translated strings for the accountIdLabel. Recommended maximum length is 15 characters to ensure full
         * string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedAccountIdLabel = null,
        /**
         * Optional.
         * Translated strings for the rewardsTierLabel. Recommended maximum length is 9 characters to ensure full
         * string is displayed on smaller screens.
         */
        public ?LocalizedString $localizedRewardsTierLabel = null,
        /**
         * Optional.
         * Translated strings for the rewardsTier. Recommended maximum length is 7 characters to ensure full string
         * is displayed on smaller screens.
         */
        public ?LocalizedString $localizedRewardsTier = null,
        /**
         * Optional.
         * The secondary rewards tier label, such as "Rewards Tier.".
         */
        public ?string $secondaryRewardsTierLabel = null,
        /**
         * Optional.
         * Translated strings for the secondaryRewardsTierLabel.
         */
        public ?LocalizedString $localizedSecondaryRewardsTierLabel = null,
        /**
         * Optional.
         * The secondary rewards tier, such as "Gold" or "Platinum.".
         */
        public ?string $secondaryRewardsTier = null,
        /**
         * Optional.
         * Translated strings for the secondaryRewardsTier.
         */
        public ?LocalizedString $localizedSecondaryRewardsTier = null,
        /**
         * Optional.
         * Information about how the class may be discovered and instantiated from within the Google Pay app.
         */
        public ?DiscoverableProgram $discoverableProgram = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
