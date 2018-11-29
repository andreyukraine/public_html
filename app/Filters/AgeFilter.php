<?php

// TypeFilter.php

namespace App\Filters;
use Illuminate\Support\Facades\DB;

class AgeFilter{

    public function filter($query, $value)
    {
        //$query = DB::table('product');
        //$result = $query->where('product_options.value',"=",$value);
        //dd($result->toSql());
        //if (count($result->get()) > 0) {
        //    return $result;
        //}else{
            return $query;
        //}
    }
}