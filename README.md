# This is my package laravel-wellness

[![Latest Version on Packagist](https://img.shields.io/packagist/v/prakort/laravel-wellness.svg?style=flat-square)](https://packagist.org/packages/prakort/laravel-wellness)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/prakort/laravel-wellness/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/prakort/laravel-wellness/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/prakort/laravel-wellness/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/prakort/laravel-wellness/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/prakort/laravel-wellness.svg?style=flat-square)](https://packagist.org/packages/prakort/laravel-wellness)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-wellness.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-wellness)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require prakort/laravel-wellness
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-wellness-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-wellness-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-wellness-views"
```

## Usage

```php
$laravelWellness = new prakort\LaravelWellness();
echo $laravelWellness->echoPhrase('Hello, prakort!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Prakort Lean](https://github.com/prakort)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
