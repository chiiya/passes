# Changelog

All notable changes to `passes` will be documented in this file.

## v1.2.0 - 2025-02-20

- Fixed localizations not being included in the manifest

**Full Changelog**: https://github.com/chiiya/passes/compare/1.1.0...1.2.0

## v1.1.0 - 2025-02-20

### What's Changed

* Bump ramsey/composer-install from 2 to 3 by @dependabot in https://github.com/chiiya/passes/pull/34
* Bump dependabot/fetch-metadata from 1.6.0 to 2.3.0 by @dependabot in https://github.com/chiiya/passes/pull/36
* Improve openssl pkcs12 file compatibility by @Jeroenwv in https://github.com/chiiya/passes/pull/30
* Fix issue with missing properties on Google API responses [!12](https://github.com/chiiya/passes/issues/12)

**Full Changelog**: https://github.com/chiiya/passes/compare/1.0.1...1.1.0

## v1.0.0 - 2024-10-10

### What's Changed

* Replaced deprecated `spatie/data-transfer-object` with `antwerpes/data-transfer-object`

### Breaking Changes

Replacing the package required several minor breaking changes:

#### Error Messages

In case you were manually matching and handling error messages (e.g. validation), these have now changed.

#### Array Constructor Notation

While not encouraged before, it was possible to pass an array as the only constructor argument to all classes. This is no longer possible. Use either the `::decode($array)` function or named parameters:

```php
// Before
$pass = new Coupon([
    'description' => '15% off purchases',
    'organizationName' => 'ACME',
    'passTypeIdentifier' => 'pass.acme.wallet',
    'serialNumber' => '1464194291627',
    'headerFields' => [
        ['key' => 'coupon-type', 'value' => '#15-percent']
    ],
]);

// After
$pass = new Coupon(
    description: '15% off purchases',
    organizationName: 'ACME',
    passTypeIdentifier: 'pass.acme.wallet',
    serialNumber: '1464194291627',
    teamIdentifier: '123456789',
    headerFields: [
        new SecondaryField(key: 'coupon-type', value: "#15-percent"),
    ],
);

// Or alternatively
$pass = Coupon::decode([
    'description' => '15% off purchases',
    'organizationName' => 'ACME',
    'passTypeIdentifier' => 'pass.acme.wallet',
    'serialNumber' => '1464194291627',
    'headerFields' => [
        ['key' => 'coupon-type', 'value' => '#15-percent']
    ],
]);



```
**Important:** The only documented example was the `JWT` class, for which this behavior has also changed:

```php
// Before
$jwt = (new JWT([
    'iss' => $credentials->client_email,
    'key' => $credentials->private_key,
    'origins' => ['https://example.org'],
]))->addOfferObject($object)->sign();

// After
$jwt = (new JWT(
    iss: $credentials->client_email,
    key: $credentials->private_key,
    origins: ['https://example.org'],
))->addOfferObject($object)->sign();



```
#### Casts During Object Construction

Casts are no longer applied when the constructor is executed, but only during the `encode()` oder `decode()` functions. In practice that means that:

- You can still pass `DateTime` objects to date fields, they will be casted to string when encoded and serialized, just as before.
- Legacy values are only casted when decoding responses from Google, not when you supply legacy values to the constructor. This may lead to errors if you're still using legacy values in your application.

```php
use Chiiya\Passes\Google\Enumerators\Offer\RedemptionChannel;

// Before, this used to work
$class = new OfferClass(
    redemptionChannel: 'instore',
);
// Now should use valid values
$class = new OfferClass(
    redemptionChannel: RedemptionChannel::INSTORE,
);



```
**Full Changelog**: https://github.com/chiiya/passes/compare/0.6.0...1.0.0

## v0.6.0 - 2024-09-18

### What's Changed

* Fix google example generic broken url by @skrskr in https://github.com/chiiya/passes/pull/32
* Use match expressions in mapLegacyValues by @kauhat in https://github.com/chiiya/passes/pull/31
* Resolve phpcsfixer warnings by @Jeroenwv in https://github.com/chiiya/passes/pull/29
* Bump actions/checkout from 3 to 4 by @dependabot in https://github.com/chiiya/passes/pull/21
* Bump stefanzweifel/git-auto-commit-action from 4 to 5 by @dependabot in https://github.com/chiiya/passes/pull/23
* Remove empty values before encoding by @Synchro in https://github.com/chiiya/passes/pull/25
* Add support for the genericType field by @Synchro in https://github.com/chiiya/passes/pull/26
* Add support for wide logo images by @Synchro in https://github.com/chiiya/passes/pull/27

### New Contributors

* @skrskr made their first contribution in https://github.com/chiiya/passes/pull/32
* @kauhat made their first contribution in https://github.com/chiiya/passes/pull/31
* @Jeroenwv made their first contribution in https://github.com/chiiya/passes/pull/29

**Full Changelog**: https://github.com/chiiya/passes/compare/0.5.0...0.6.0

## v0.5.0 - 2023-08-20

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.6 to 1.4.0 by @dependabot in https://github.com/chiiya/passes/pull/16
- Bump dependabot/fetch-metadata from 1.4.0 to 1.5.1 by @dependabot in https://github.com/chiiya/passes/pull/17
- Bump dependabot/fetch-metadata from 1.5.1 to 1.6.0 by @dependabot in https://github.com/chiiya/passes/pull/18
- Implement a workaround for compatibility with legacy openssl pkcs12 files by @Synchro in https://github.com/chiiya/passes/pull/19

### New Contributors

- @Synchro made their first contribution in https://github.com/chiiya/passes/pull/19

**Full Changelog**: https://github.com/chiiya/passes/compare/0.4.0...0.5.0

## v0.4.0 - 2023-02-20

### What's Changed

- Add Google GenericPass functionality by @kerattila in https://github.com/chiiya/passes/pull/14

**Full Changelog**: https://github.com/chiiya/passes/compare/0.3.1...0.4.0

## v0.3.1 - 2023-01-30

### What's Changed

- Add GroupingInfo->groupingId as per docs by @kerattila in https://github.com/chiiya/passes/pull/11

### New Contributors

- @kerattila made their first contribution in https://github.com/chiiya/passes/pull/11

**Full Changelog**: https://github.com/chiiya/passes/compare/0.3.0...0.3.1

## v0.3.0 - 2022-04-21

## What's Changed

- Fix `classReference` being encoded in Google Pass Object JWTs.
- Add methods for creating skinny JWTs for Google Pass Objects (e.g. `addSkinnyOfferObject`), which will only include the object ID. See also https://developers.google.com/pay/passes/guides/introduction/typical-api-flows#skinny-jwt

**Full Changelog**: https://github.com/chiiya/passes/compare/0.2.6...0.3.0

## v0.2.6 - 2022-04-01

## What's Changed

- Fix missing cache initialization by @pazzernick in https://github.com/chiiya/passes/pull/5
- Use strict typing

## New Contributors

- @pazzernick made their first contribution in https://github.com/chiiya/passes/pull/5

**Full Changelog**: https://github.com/chiiya/passes/compare/0.2.5...0.2.6

## 0.0.1 - 2022-03-03

- Initial release
