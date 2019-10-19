<?php

namespace Otisz\EloquentFilter\Traits;

/**
 * @property \Illuminate\Database\Eloquent\Builder $builder
 */
trait EloquentFunctions
{
    /**
     * Execute the query as a "select" statement.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get(array $columns = ['*'])
    {
        return $this->builder->get($columns);
    }

    /**
     * Execute the query and get the first result.
     *
     * @param  array  $columns
     * @return \Illuminate\Database\Eloquent\Model|object|static|null
     */
    public function first($columns = ['*'])
    {
        return $this->builder->first($columns);
    }

    /**
     * Determine if any rows exist for the current query.
     *
     * @return bool
     */
    public function exists()
    {
        return $this->builder->exists();
    }

    /**
     * Die and dump the current SQL and bindings.
     *
     * @return void
     */
    public function dd()
    {
        $this->builder->dd();
    }

    /**
     * Dump the current SQL and bindings.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function dump()
    {
        return $this->builder->dump();
    }

    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->builder->paginate($perPage, $columns, $pageName, $page);
    }
}
