# Passes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chiiya/passes.svg?style=flat-square)](https://packagist.org/packages/chiiya/passes)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/chiiya/passes/run-tests?label=tests)](https://github.com/chiiya/passes/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/chiiya/passes/lint?label=code%20style)](https://github.com/chiiya/passes/actions?query=workflow%3Alint+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/chiiya/passes.svg?style=flat-square)](https://packagist.org/packages/chiiya/passes)

PHP library for creating iOS and Android Wallet Passes.

## Installation

You can install the package via composer:

```bash
composer require chiiya/passes
```

## Usage

First, acquire the necessary credentials and certificates as described in [documentation/requirements.md](documentation/requirements.md).

### Apple Examples

- [examples/apple_coupon.php](examples/apple_coupon.php)

### Google Examples

- [examples/google_offer.php](examples/google_offer.php)
- [examples/google_generic_pass.php](examples/google_generic_pass.php)

## Testing

```bash
just test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
