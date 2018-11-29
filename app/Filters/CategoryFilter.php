<?php
/**
 * Created by PhpStorm.
 * User: BX
 * Date: 27.09.2018
 * Time: 21:47
 */

namespace App\Filters;


class CategoryFilter
{
    public function filter($query, $value)
    {
        return $query->leftjoin('category_option', 'category_option.product_id', '=', 'product.id' )->where('category_option.category_id', '=', $value);
    }
}