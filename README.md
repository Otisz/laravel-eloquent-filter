# Laravel Eloquent Filter

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Total Downloads][shield-downloads]][link-packagist]

Laravel package for generating flexible Eloquent filters.

## Dependencies 

- [PHP](https://secure.php.net): ^7.3
- [illuminate/database](https://github.com/illuminate/database): ^6.0 | ^7.0 | ^8.0
- [illuminate/http](https://github.com/illuminate/http): ^6.0 | ^7.0 | ^8.0
- [illuminate/support](https://github.com/illuminate/support): ^6.0 | ^7.0 | ^8.0

## Install

You can install the package via [Composer](https://getcomposer.org/)
```bash
$ composer require otisz/laravel-eloquent-filter
```
    
## Usage

Use the artisan command to create a new filter class:

```bash
$ php artisan make:filter TestFilter
```

This command generates a new filter class to `app/Filters` folder:

```php
<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Otisz\EloquentFilter\Filter;

/**
 * @property \Illuminate\Database\Eloquent\Builder $builder
 * @method static \App\Filters\TestFilter boot($class)
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
final class TestFilter extends Filter
{
        /**
         * @param  \Illuminate\Http\Request|null  $request
         *
         * @return self
         */
        public function search(Request $request = null)
        {
            //
    
            return $this;
        }
    
        /**
         * @param  \Illuminate\Http\Request|null  $request
         *
         * @return self
         */
        public function order(Request $request = null)
        {
            //
    
            return $this;
        }
}

```

### How to use in your controller:

There are 3 ways to boot up filter class:

```php
// Eloquent Builder:
TestFilter::boot(Model::query());
TestFilter::boot(Model::where('column', '=', 1));

// Namespace
TestFilter::boot(Model::class);

// Model
TestFilter::boot(new Model);
```

Filter class contains 2 methods: `search()` and `order()`. \
You can pass `\Illuminate\Http\Request` or `\Illuminate\Foundation\Http\FormRequest` to these methods, but not required.

```php
TestFilter::boot(Model::class)->search()->order();
```

If you call a method that is not defined in the filter class, it will automatically call the Builder class.

For example filter class does not have `toSql()` method:
`TestFilter::boot(Model::class)->toSql();`

In this case, `toSql()` method called on Builder class: `$this->builder->toSql()`

> Feel free write your method if needed.


## Contributing

### Security Vulnerabilities

If you discover any security-related issues, please email [leventeotta@gmail.com](mailto:leventeotta@gmail.com) instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## Licence

The Laravel Eloquent Filter package is open-source software licensed under the [MIT license](LICENSE.md).

[shield-packagist]: https://img.shields.io/packagist/v/otisz/laravel-eloquent-filter.svg?style=flat-square
[shield-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[shield-downloads]: https://img.shields.io/packagist/dt/otisz/laravel-eloquent-filter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/otisz/laravel-eloquent-filter
