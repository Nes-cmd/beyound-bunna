<?php
namespace App\Helper\Filters;

class NameFilter{
    function __invoke($query, $name){
        return $query->where('name', 'like','%'.$name.'%');
    }
}