<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Common\Validation\MaxLength;
use Chiiya\Passes\Common\Validation\Required;
use Chiiya\Passes\Google\Components\Common\Image;
use Chiiya\Passes\Google\Components\Common\LocalizedString;
use Chiiya\Passes\Google\Components\Loyalty\DiscoverableProgram;

class LoyaltyClass extends BaseClass
{
    /** @var string */
    final public const IDENTIFIER = 'loyaltyClass';

    /**
     * Required.
     * The program name, such as "Adam's Apparel". The app may display an ellipsis after the first 20
     * characters to ensure full string is displayed on smaller screens.
     */
    #[Required]
    public ?string $programName;

    /**
     * Required.
     * The logo of the loyalty program or company. This logo is displayed in both the details and list
     * views of the app.
     */
    #[Required]
    public ?Image $programLogo;

    /**
     * Optional.
     * The account name label, such as "Member Name." Recommended maximum length is 15 characters to
     * ensure full string is displayed on smaller screens.
     */
    #[MaxLength(15)]
    public ?string $accountNameLabel;

    /**
     * Optional.
     * The account ID label, such as "Member ID." Recommended maximum length is 15 characters to ensure
     * full string is displayed on smaller screens.
     */
    #[MaxLength(15)]
    public ?string $accountIdLabel;

    /**
     * Optional.
     * The rewards tier label, such as "Rewards Tier." Recommended maximum length is 9 characters to ensure
     * full string is displayed on smaller screens.
     */
    #[MaxLength(9)]
    public ?string $rewardsTierLabel;

    /**
     * Optional.
     * The rewards tier, such as "Gold" or "Platinum." Recommended maximum length is 7 characters to ensure
     * full string is displayed on smaller screens.
     */
    #[MaxLength(7)]
    public ?string $rewardsTier;

    /**
     * Optional.
     * Translated strings for the programName. The app may display an ellipsis after the first 20 characters
     * to ensure full string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedProgramName;

    /**
     * Optional.
     * Translated strings for the accountNameLabel. Recommended maximum length is 15 characters to ensure
     * full string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedAccountNameLabel;

    /**
     * Optional.
     * Translated strings for the accountIdLabel. Recommended maximum length is 15 characters to ensure full
     * string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedAccountIdLabel;

    /**
     * Optional.
     * Translated strings for the rewardsTierLabel. Recommended maximum length is 9 characters to ensure full
     * string is displayed on smaller screens.
     */
    public ?LocalizedString $localizedRewardsTierLabel;

    /**
     * Optional.
     * Translated strings for the rewardsTier. Recommended maximum length is 7 characters to ensure full string
     * is displayed on smaller screens.
     */
    public ?LocalizedString $localizedRewardsTier;

    /**
     * Optional.
     * The secondary rewards tier label, such as "Rewards Tier.".
     */
    public ?string $secondaryRewardsTierLabel;

    /**
     * Optional.
     * Translated strings for the secondaryRewardsTierLabel.
     */
    public ?LocalizedString $localizedSecondaryRewardsTierLabel;

    /**
     * Optional.
     * The secondary rewards tier, such as "Gold" or "Platinum.".
     */
    public ?string $secondaryRewardsTier;

    /**
     * Optional.
     * Translated strings for the secondaryRewardsTier.
     */
    public ?LocalizedString $localizedSecondaryRewardsTier;

    /**
     * Optional.
     * Information about how the class may be discovered and instantiated from within the Google Pay app.
     */
    public ?DiscoverableProgram $discoverableProgram;
}
