# Laravel Eloquent Filter

[![Latest Version on Packagist][shield-packagist]][link-packagist]
[![Software License][shield-license]](LICENSE.md)
[![Build Status][shield-travis]][link-travis]
[![Total Downloads][shield-downloads]][link-packagist]

Laravel package for generating flexible Eloquent filters.

## Dependencies 

- [PHP](https://secure.php.net): ^7.1
- [illuminate/database](https://github.com/illuminate/database): ~5.7.0|~5.8.0|^6.0
- [illuminate/http](https://github.com/illuminate/http): ~5.7.0|~5.8.0|^6.0
- [illuminate/support](https://github.com/illuminate/support): ~5.7.0|~5.8.0|^6.0

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
 * @method \Illuminate\Contracts\Pagination\LengthAwarePaginator paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
 * @method \Illuminate\Database\Eloquent\Collection get(array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Builder getBuilder()
 * @method void dd()
 * @method \Illuminate\Database\Eloquent\Builder dump()
 */
final class TestFilter extends Filter
{
    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return $this
     */
    public function where(Request $request)
    {
        //

        return $this;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return $this
     */
    public function orderBy(Request $request)
    {
        //

        return $this;
    }
}

```

###How to use in your controller:

There is 3 ways to boot up filter class:

- From Eloquent Builder:

```php
TestFilter::boot(Model::query());
```

Note: You can "hide" everything in filter class, but you can pass through a pre-defined builder.

```php
$builder = Model::where('column', '=', 1);
TestFilter::boot($builder);
```

- From namespace:

```php
TestFilter::boot(Model::class);
```

- From model:

```php
TestFilter::boot(new Model);
```

After boot up you can chain `where()` and `orderBy()` methods. \
These methods requires `\Illuminate\Http\Request` (compatible with `\Illuminate\Foundation\Http\FormRequest`) as parameter.

```php
TestFilter::boot(Model::query())->where($request)->orderBy($request);
```

You call some Eloquent Builder method through filter class:

- `->get($columns = ['*']): \Illuminate\Database\Eloquent\Collection|static[]`
- `->first($columns = ['*']): \Illuminate\Database\Eloquent\Model|object|static|null`
- `->exists(): bool`
- `->dd(): void`
- `->dump(): \Illuminate\Database\Eloquent\Builder`
- `->paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator`

Or write your method if needed.

## Testing

``` bash
$ composer test
```

## Contributing

### Security Vulnerabilities

If you discover any security-related issues, please email [leventeotta@gmail.com](mailto:leventeotta@gmail.com) instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## Licence

The Laravel Eloquent Filter package is open-source software licensed under the [MIT license](LICENSE.md).

[shield-packagist]: https://img.shields.io/packagist/v/otisz/laravel-eloquent-filter.svg?style=flat-square
[shield-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[shield-travis]: https://img.shields.io/travis/Otisz/laravel-eloquent-filter.svg?style=flat-square
[shield-downloads]: https://img.shields.io/packagist/dt/otisz/laravel-eloquent-filter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/otisz/laravel-eloquent-filter
[link-travis]: https://travis-ci.org/Otisz/laravel-eloquent-filter
