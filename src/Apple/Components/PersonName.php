<?php declare(strict_types=1);

namespace Chiiya\Passes\Apple\Components;

use Chiiya\Passes\Common\Component;
use Spatie\DataTransferObject\Attributes\Strict;

#[Strict]
class PersonName extends Component
{
    /**
     * Optional.
     * The person’s family name or last name.
     */
    public ?string $familyName;

    /**
     * Optional.
     * The person’s given name; also called the forename or first name in some countries.
     */
    public ?string $givenName;

    /**
     * Optional.
     * The person’s middle name.
     */
    public ?string $middleName;

    /**
     * Optional.
     * The prefix for the person’s name, such as “Dr”.
     */
    public ?string $namePrefix;

    /**
     * Optional.
     * The suffix for the person’s name, such as “Junior”.
     */
    public ?string $nameSuffix;

    /**
     * Optional.
     * The person’s nickname.
     */
    public ?string $nickname;

    /**
     * Optional.
     * The phonetic representation of the person’s name.
     */
    public ?string $phoneticRepresentation;
}
