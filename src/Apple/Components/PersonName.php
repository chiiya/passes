<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;

class PersonName extends Component
{
    public function __construct(
        /**
         * Optional.
         * The person’s family name or last name.
         */
        public ?string $familyName = null,
        /**
         * Optional.
         * The person’s given name; also called the forename or first name in some countries.
         */
        public ?string $givenName = null,
        /**
         * Optional.
         * The person’s middle name.
         */
        public ?string $middleName = null,
        /**
         * Optional.
         * The prefix for the person’s name, such as “Dr”.
         */
        public ?string $namePrefix = null,
        /**
         * Optional.
         * The suffix for the person’s name, such as “Junior”.
         */
        public ?string $nameSuffix = null,
        /**
         * Optional.
         * The person’s nickname.
         */
        public ?string $nickname = null,
        /**
         * Optional.
         * The phonetic representation of the person’s name.
         */
        public ?string $phoneticRepresentation = null,
    ) {
        parent::__construct();
    }
}
