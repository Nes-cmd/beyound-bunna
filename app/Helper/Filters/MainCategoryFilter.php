<?php

namespace App\Helper\Filters;

class MainCategoryFilter{
    function __invoke($query, $mainCategoryId)
    {
        return $query->whereHas('mainCategory', function($query) use ($mainCategoryId){
            $query->where('main_category_id', $mainCategoryId);
        });
    }
}