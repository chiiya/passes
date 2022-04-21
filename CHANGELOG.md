# Changelog

All notable changes to `passes` will be documented in this file.

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
