<?php
/**
 * Created by PhpStorm.
 * User: BX
 * Date: 27.09.2018
 * Time: 23:01
 */

namespace App\Filters;

class OptionsFilter
{
    public function filter($query, $value)
    {

        $result = $query->wherein('product_options.value', $value);

        return $result;

    }
}