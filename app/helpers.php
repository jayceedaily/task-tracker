<?php


if(!function_exists('get_sql_with_bindings')) {

    /**
     * Get SQL query of an Eloquent query builder
     *
     * @param mixed $query
     * @return string
     */
    function get_sql_with_bindings($query) {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

}
