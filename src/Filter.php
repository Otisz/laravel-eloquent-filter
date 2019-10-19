<?php

namespace Otisz\EloquentFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use InvalidArgumentException;
use Otisz\EloquentFilter\Traits\EloquentFunctions;

abstract class Filter
{
    use EloquentFunctions;

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    private $builder;

    /**
     * @var array
     */
    protected $filterable = [];

    /**
     * @var array
     */
    protected $orderable = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return self
     */
    abstract public function where(Request $request);

    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return self
     */
    abstract public function orderBy(Request $request);

    /**
     * @param  \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|string  $class
     *
     * @return static
     */
    public static function boot($class)
    {
        if ($class instanceof Builder) {
            return new static($class);
        }

        if ($class instanceof Model) {
            return new static($class::query());
        }

        if (is_string($class)) {
            return new static((new $class)->newQuery());
        }

        throw new InvalidArgumentException(sprintf('Unable to load %s', Builder::class));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder()
    {
        return $this->builder;
    }
}