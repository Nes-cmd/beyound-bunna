<?php

namespace App\Helper\Filters;

class SubCategoryFilter{
    function __invoke($query, $subCategory){
        return $query->whereHas('subCategory', function($query) use ($subCategory){
            $query->where('sub_category_id', $subCategory);
        });
    }
}