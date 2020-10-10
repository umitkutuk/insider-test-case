<?php

namespace Illuminate\Database\Query {
    class Builder
    {
        /**
         * Paginate the given query safely.
         *
         * @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle()
         * @see \App\Providers\AppServiceProvider::registerDatabaseBuilderMacros()
         *
         * @param null|int $perPage
         * @param string[] $columns
         * @param string $pageName
         * @param null $page
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function safelyPaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
        {
        }
    }
}

namespace Illuminate\Database\Eloquent {
    class Builder
    {
        /**
         * Paginate the given query safely.
         *
         * @see \App\Http\Middleware\CheckPerPageQueryParameterForPagination::handle()
         * @see \App\Providers\AppServiceProvider::registerDatabaseBuilderMacros()
         *
         * @param null|int $perPage
         * @param string[] $columns
         * @param string $pageName
         * @param null $page
         * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
         */
        public function safelyPaginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
        {
        }
    }
}
