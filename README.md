#

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mustafarefaey/laravel-custom-payment.svg?style=flat-square)](https://packagist.org/packages/mustafarefaey/laravel-custom-payment)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mustafarefaey/laravel-custom-payment/run-tests?label=tests)](https://github.com/mustafarefaey/laravel-custom-payment/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/mustafarefaey/laravel-custom-payment.svg?style=flat-square)](https://packagist.org/packages/mustafarefaey/laravel-custom-payment)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require mustafarefaey/laravel-custom-payment
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="MustafaRefaey\LaravelCustomPayment\LaravelCustomPaymentServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="MustafaRefaey\LaravelCustomPayment\LaravelCustomPaymentServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-custom-payment = new MustafaRefaey\LaravelCustomPayment();
echo $laravel-custom-payment->echoPhrase('Hello, MustafaRefaey!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Mustafa Refaey](https://github.com/mustafarefaey)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
