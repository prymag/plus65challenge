<?php

if (!function_exists('getQuery')) {
    function getQuery($query) {
        return preg_replace_array('/[?]/', $query->getBindings(), $query->toSql());
    }
}