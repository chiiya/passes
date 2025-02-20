<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Passes;

use Chiiya\Passes\Google\Components\Common\DateTime;
use Chiiya\Passes\Google\Components\Common\Money;
use Symfony\Component\Validator\Constraints\NotBlank;

class GiftCardObject extends BaseObject
{
    /** @var string */
    final public const IDENTIFIER = 'giftCardObject';

    public function __construct(
        /**
         * Required.
         * The card's number.
         */
        #[NotBlank]
        public string $cardNumber,
        /**
         * Optional.
         * A copy of the inherited fields of the parent class. These fields are retrieved during a GET.
         */
        public ?GiftCardClass $classReference = null,
        /**
         * Optional.
         * The card's PIN.
         */
        public ?string $pin = null,
        /**
         * Optional.
         * The card's monetary balance.
         */
        public ?Money $balance = null,
        /**
         * Optional.
         * The date and time when the balance was last updated.
         */
        public ?DateTime $balanceUpdateTime = null,
        /**
         * Optional.
         * The card's event number, an optional field used by some gift cards.
         */
        public ?string $eventNumber = null,
        ...$args,
    ) {
        parent::__construct(...$args);
    }
}
