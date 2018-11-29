<?php

// ProductFilter.php

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    protected $filters = [
        'cat' => CategoryFilter::class,
        'size' => SizeFilter::class,
        'age' => AgeFilter::class,
        'options' => OptionsFilter::class
    ];
}