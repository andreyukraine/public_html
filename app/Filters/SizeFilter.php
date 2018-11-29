<?php
/**
 * Created by PhpStorm.
 * User: BX
 * Date: 27.09.2018
 * Time: 23:01
 */

namespace App\Filters;
use Illuminate\Support\Facades\DB;

class SizeFilter
{
    public function filter($query, $value)
    {

        //$result = $query->where('product_options.value', "=", $value);
        //dd($result->toSql());
        //if (count($result->get()) > 0) {
        //    return $result;
        //}else{
            return $query;
        //}
    }
}