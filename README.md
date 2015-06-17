# laravel-or-abort

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-or-abort.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-or-abort)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/spatie/laravel-or-abort/master.svg?style=flat-square)](https://travis-ci.org/spatie/laravel-or-abort)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/4e770b13-3d06-4494-8cb1-accbd350de0c.svg?style=flat-square)](https://insight.sensiolabs.com/projects/4e770b13-3d06-4494-8cb1-accbd350de0c)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-or-abort.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-or-abort)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-or-abort.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-or-abort)

This package adds an `OrAbort`-trait to your laravel project.

## Install

You can install the package via composer:
``` bash
$ composer require spatie/laravel-or-abort
```

## Usage

When implementing the `OrAbort`-trait to a class, all methods of the class will have a `OrAbort`-variant.
That variant has an extra parameter that will be returned if the original function returns `null` or `false`.

Consider this simple class that implements the `OrAbort`-trait.

```php
use Spatie\OrAbort\OrAbort;

class TestClass {

    use OrAbort;

    /**
     * This function will return the given argument.
     *
     * @return string
     */
    public function willReturn($value)
    {
       return $value;
    }
  
}
```

The trait dynamically adds a `willReturnOrAbort`-method. 

```php
$testClass = new TestClass;
$testClass->willReturn('value'); // returns 'value';
$testClass->willReturnOrAbort('value', 'otherValue'); // returns 'otherValue';
$testClass->willReturnOrAbort(null, 'otherValue'); // returns 'otherValue';
$testClass->willReturnOrAbort(false, 'otherValue'); // returns 'otherValue';
$testClass->willReturnOrAbort(false', function() { return 'closureValue'; }); // returns 'closureValue';
```

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
- [Edd Mann](https://twitter.com/edd_mann)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
