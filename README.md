# laravel-or-abort

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-or-abort.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-or-abort)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/spatie/laravel-or-abort/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-or-abort)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/f91a946a-83e5-405f-8546-4cfd6a29b93e.svg?style=flat-square)](https://insight.sensiolabs.com/projects/f91a946a-83e5-405f-8546-4cfd6a29b93e)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-or-abort.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-or-abort)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-or-abort.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-or-abort)

This package adds an `OrAbort`-trait to your Laravel project.

## Install

You can install the package via composer:
``` bash
$ composer require spatie/laravel-or-abort
```

## Usage

You can use the `Spatie\OrAbort\OrAbort`-trait on any class you want. All the methods of the class
will gain `orAbort`-variant. When the original function returns a falsy value Laravel's `abort`-function
will be called with code 404.

Why in the world would you want use this trait?

If you use repositories you probably have written this kind of code:
```php
$article = $articleRepository->find($articleId) ?: abort(404)
```

By using this trait on your repository you can write it a bit more readable:
```php
$article = $articleRepository->findOrAbort($articleId)
```

You can even add an extra parameter to specify an abort code.
```php
$article = $articleRepository->findOrAbort($articleId, 500) 
```
If the `find`-function on your repository returns a falsy value `abort(500)` will be called.

## A word to the wise
The `orAbort`-trait uses the magic method `__call`. If your class already implements that call, you shouldn't
use our trait.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://murze.be)
- [All Contributors](../../contributors)

This package was inspired by [this article](http://tech.mybuilder.com/optional-value-control-flows-in-php-using-traits-and-magic-methods/) by [Edd Mann](https://twitter.com/edd_mann)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
