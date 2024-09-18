# Changelog

All notable changes to `passes` will be documented in this file.

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
