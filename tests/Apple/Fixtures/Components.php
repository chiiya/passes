<?php declare(strict_types=1);

namespace Chiiya\Passes\Tests\Apple\Fixtures;

use Chiiya\Passes\Apple\Components\AuxiliaryField;
use Chiiya\Passes\Apple\Components\Barcode;
use Chiiya\Passes\Apple\Components\Beacon;
use Chiiya\Passes\Apple\Components\CurrencyAmount;
use Chiiya\Passes\Apple\Components\Field;
use Chiiya\Passes\Apple\Components\Location;
use Chiiya\Passes\Apple\Components\Nfc;
use Chiiya\Passes\Apple\Components\PersonName;
use Chiiya\Passes\Apple\Components\Seat;
use Chiiya\Passes\Apple\Components\SecondaryField;
use Chiiya\Passes\Apple\Components\SemanticLocation;
use Chiiya\Passes\Apple\Components\Semantics;
use Chiiya\Passes\Apple\Components\WifiNetwork;
use Chiiya\Passes\Apple\Enumerators\BarcodeFormat;
use Chiiya\Passes\Apple\Enumerators\DataDetector;
use Chiiya\Passes\Apple\Enumerators\DateStyle;
use Chiiya\Passes\Apple\Enumerators\EventType;
use Chiiya\Passes\Apple\Enumerators\NumberStyle;
use Chiiya\Passes\Apple\Enumerators\TextAlignment;
use DateTimeImmutable;

class Components
{
    public static function location(): Location
    {
        return new Location([
            'altitude' => 10.0,
            'latitude' => 37.331,
            'longitude' => -122.029,
            'relevantText' => 'Store nearby on 3rd and Main.',
        ]);
    }

    public static function beacon(): Beacon
    {
        return new Beacon([
            'proximityUUID' => 'F8F589E9-C07E-58B0-AEAB-A36BE4D48FAC',
            'major' => 23423,
            'minor' => 234,
            'relevantText' => "You're near my store",
        ]);
    }

    public static function barcode(array $attributes = []): Barcode
    {
        return new Barcode(array_merge([
            'format' => BarcodeFormat::PDF417,
            'message' => 'ABCD 123 EFGH 456 IJKL 789 MNOP',
            'messageEncoding' => 'iso-8859-2',
            'altText' => 'Barcode: ABCD 123 EFGH 456 IJKL 789 MNOP',
        ], $attributes));
    }

    public static function nfc(): Nfc
    {
        return new Nfc([
            'message' => 'Example message',
            'encryptionPublicKey' => 'ABC123',
            'requiresAuthentication' => true,
        ]);
    }

    public static function passAttributes(): array
    {
        return [
            'description' => 'Example description',
            'formatVersion' => 1,
            'organizationName' => 'Example organization',
            'passTypeIdentifier' => 'pass.com.example.test',
            'serialNumber' => '12345',
            'teamIdentifier' => 'ABCD12345',
        ];
    }

    public static function fullPassAttributes(): array
    {
        $beacon = self::beacon();
        $location = self::location();
        $barcode = self::barcode();
        $nfc = self::nfc();

        return array_merge(self::passAttributes(), [
            'appLaunchUrl' => 'https://example.com/api',
            'associatedStoreIdentifiers' => [1, 10, 15],
            'userInfo' => [
                'user_id' => 1,
            ],
            'expirationDate' => DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2025-12-31 23:59:59'),
            'voided' => false,
            'beacons' => [$beacon],
            'locations' => [$location],
            'maxDistance' => 10,
            'relevantDate' => '2020-12-01',
            'semantics' => new Semantics(self::semantics()),
            'barcodes' => [$barcode],
            'backgroundColor' => 'rgb(255, 255, 255)',
            'foregroundColor' => 'rgb(155, 155, 155)',
            'labelColor' => 'rgb(100, 100, 100)',
            'logoText' => 'Example Logo',
            'authenticationToken' => '123456789ABCDEFGHIJKL',
            'webServiceURL' => 'https://example.org/api',
            'nfc' => $nfc,
            'sharingProhibited' => true,
            'suppressStripShine' => false,
        ]);
    }

    public static function nullablePassAttributes(): array
    {
        return [
            'appLaunchUrl' => null,
            'associatedStoreIdentifiers' => null,
            'userInfo' => null,
            'expirationDate' => null,
            'voided' => null,
            'beacons' => [],
            'locations' => [],
            'maxDistance' => null,
            'relevantDate' => null,
            'semantics' => null,
            'barcodes' => [],
            'barcode' => null,
            'backgroundColor' => null,
            'foregroundColor' => null,
            'labelColor' => null,
            'logoText' => null,
            'authenticationToken' => null,
            'webServiceURL' => null,
            'nfc' => null,
            'sharingProhibited' => null,
            'suppressStripShine' => null,
        ];
    }

    public static function fields(): array
    {
        return [
            'headerFields' => [
                new SecondaryField(key: 'header1', value: '::value::'),
                new SecondaryField(key: 'header2', value: '::value::'),
            ],
            'primaryFields' => [new Field(key: 'primary', value: '::value::')],
            'secondaryFields' => [
                new SecondaryField(key: 'secondary1', value: '::value::', textAlignment: TextAlignment::RIGHT),
                new SecondaryField(key: 'secondary2', value: '::value::'),
            ],
            'auxiliaryFields' => [new AuxiliaryField(key: 'aux', value: '::value::')],
            'backFields' => [
                new Field(key: 'back1', value: '::value::'),
                new Field(key: 'back2', value: '::value::'),
            ],
        ];
    }

    public static function fieldValues(): array
    {
        return [
            'headerFields' => [self::secondaryField('header1'), self::secondaryField('header2')],
            'primaryFields' => [self::field('primary')],
            'secondaryFields' => [
                array_merge(self::secondaryField('secondary1'), [
                    'textAlignment' => TextAlignment::RIGHT,
                ]),
                self::secondaryField('secondary2'),
            ],
            'auxiliaryFields' => [
                array_merge(self::secondaryField('aux'), [
                    'row' => null,
                ]),
            ],
            'backFields' => [self::field('back1'), self::field('back2')],
        ];
    }

    public static function field(string $key): array
    {
        return array_merge(self::nullableFieldAttributes(), [
            'key' => $key,
            'value' => '::value::',
        ]);
    }

    public static function secondaryField(string $key): array
    {
        return array_merge(
            self::nullableFieldAttributes(),
            [
                'key' => $key,
                'value' => '::value::',
                'textAlignment' => null,
            ],
        );
    }

    public static function fieldAttributes(): array
    {
        return [
            'attributedValue' => "<a href='#'>Edit my profile</a>",
            'changeMessage' => 'Profile link changed to %@.',
            'dataDetectorTypes' => [DataDetector::LINK],
            'key' => 'link',
            'label' => 'Edit my profile',
            'value' => '#',
            'dateStyle' => DateStyle::NONE,
            'ignoresTimeZone' => false,
            'isRelative' => false,
            'timeStyle' => DateStyle::SHORT,
            'currencyCode' => 'EUR',
            'numberStyle' => NumberStyle::DECIMAL,
        ];
    }

    public static function nullableFieldAttributes(): array
    {
        return [
            'attributedValue' => null,
            'changeMessage' => null,
            'dataDetectorTypes' => null,
            'label' => null,
            'dateStyle' => null,
            'ignoresTimeZone' => null,
            'isRelative' => null,
            'timeStyle' => null,
            'currencyCode' => null,
            'numberStyle' => null,
        ];
    }

    public static function currencyAmount(): array
    {
        return [
            'amount' => '10.00',
            'currencyCode' => 'USD',
        ];
    }

    public static function semanticLocation(): array
    {
        return [
            'latitude' => 37.331,
            'longitude' => -122.029,
        ];
    }

    public static function personName(): array
    {
        return [
            'familyName' => '::family::',
            'givenName' => '::given::',
            'middleName' => '::middle::',
            'namePrefix' => '::prefix::',
            'nameSuffix' => '::suffix::',
            'nickname' => '::nickname::',
            'phoneticRepresentation' => '::phonetic::',
        ];
    }

    public static function seat(): array
    {
        return [
            'seatDescription' => '::description::',
            'seatIdentifier' => '::identifier::',
            'seatNumber' => '::number::',
            'seatRow' => '::row::',
            'seatSection' => '::section::',
            'seatType' => '::type::',
        ];
    }

    public static function wifiNetwork(): array
    {
        return [
            'password' => '::password::',
            'ssid' => '::ssid::',
        ];
    }

    public static function semantics(): array
    {
        return [
            'airlineCode' => '::airlineCode::',
            'artistIDs' => ['::artistIDs::'],
            'awayTeamAbbreviation' => '::awayTeamAbbreviation::',
            'awayTeamLocation' => '::awayTeamLocation::',
            'awayTeamName' => '::awayTeamName::',
            'balance' => new CurrencyAmount(self::currencyAmount()),
            'boardingGroup' => '::boardingGroup::',
            'boardingSequenceNumber' => '::boardingSequenceNumber::',
            'carNumber' => '::carNumber::',
            'confirmationNumber' => '::confirmationNumber::',
            'currentArrivalDate' => new DateTimeImmutable('2022-01-01 08:00:00'),
            'currentBoardingDate' => '::currentBoardingDate::',
            'currentDepartureDate' => '::currentDepartureDate::',
            'departureAirportCode' => '::departureAirportCode::',
            'departureAirportName' => '::departureAirportName::',
            'departureGate' => '::departureGate::',
            'departureLocation' => new SemanticLocation(self::semanticLocation()),
            'departureLocationDescription' => '::departureLocationDescription::',
            'departurePlatform' => '::departurePlatform::',
            'departureStationName' => '::departureStationName::',
            'departureTerminal' => '::departureTerminal::',
            'destinationAirportCode' => '::destinationAirportCode::',
            'destinationAirportName' => '::destinationAirportName::',
            'destinationGate' => '::destinationGate::',
            'destinationLocation' => new SemanticLocation(self::semanticLocation()),
            'destinationLocationDescription' => '::destinationLocationDescription::',
            'destinationPlatform' => '::destinationPlatform::',
            'destinationStationName' => '::destinationStationName::',
            'destinationTerminal' => '::destinationTerminal::',
            'duration' => 10,
            'eventEndDate' => '::eventEndDate::',
            'eventName' => '::eventName::',
            'eventStartDate' => '::eventStartDate::',
            'eventType' => EventType::MOVIE,
            'flightCode' => '::flightCode::',
            'flightNumber' => 123,
            'genre' => '::genre::',
            'homeTeamAbbreviation' => '::homeTeamAbbreviation::',
            'homeTeamLocation' => '::homeTeamLocation::',
            'homeTeamName' => '::homeTeamName::',
            'leagueAbbreviation' => '::leagueAbbreviation::',
            'leagueName' => '::leagueName::',
            'membershipProgramName' => '::membershipProgramName::',
            'membershipProgramNumber' => '::membershipProgramNumber::',
            'originalArrivalDate' => '::originalArrivalDate::',
            'originalBoardingDate' => '::originalBoardingDate::',
            'originalDepartureDate' => '::originalDepartureDate::',
            'passengerName' => new PersonName(self::personName()),
            'performerNames' => ['::performerNames::'],
            'priorityStatus' => '::priorityStatus::',
            'seats' => [new Seat(self::seat())],
            'securityScreening' => '::securityScreening::',
            'silenceRequested' => false,
            'sportName' => '::sportName::',
            'totalPrice' => new CurrencyAmount(self::currencyAmount()),
            'transitProvider' => '::transitProvider::',
            'transitStatus' => '::transitStatus::',
            'transitStatusReason' => '::transitStatusReason::',
            'vehicleName' => '::vehicleName::',
            'vehicleNumber' => '::vehicleNumber::',
            'vehicleType' => '::vehicleType::',
            'venueEntrance' => '::venueEntrance::',
            'venueLocation' => new SemanticLocation(self::semanticLocation()),
            'venueName' => '::venueName::',
            'venuePhoneNumber' => '::venuePhoneNumber::',
            'venueRoom' => '::venueRoom::',
            'wifiAccess' => [new WifiNetwork(self::wifiNetwork())],
        ];
    }
}
