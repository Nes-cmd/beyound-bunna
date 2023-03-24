<?php

namespace App\Helper;

class ProductFilters
{
    protected $filters = [
        'price' => \App\Helper\Filters\PriceFilter::class,
        'main_category_id' => \App\Helper\Filters\MainCategoryFilter::class,
        'sub_category_id' => \App\Helper\Filters\SubCategoryFilter::class,
        'name' => \App\Helper\Filters\NameFilter::class,
    ];
    public $userInputs = [];
    public function apply($query)
    {
        foreach ($this->filterInputs() as $name => $value) {
            $filterInstance = new $this->filters[$name];
            $query = $filterInstance($query, $value);
        }

        return $query;
    }
    public function filterInputs()
    {
        return array_filter($this->userInputs);
    }
    public function receivedFilters()
    {
        return request()->only(array_keys($this->filters));
    }
}
