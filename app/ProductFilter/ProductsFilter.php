<?php

namespace App\ProductFilter;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ProductsFilter {

    protected  $builder;
    protected  $request;

    public function __construct($builder, $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    public function apply(){
        foreach ($this->filters() as $filter => $value){
            if(method_exists($this, $filter)){
                $this->$filter($value);
            }
        }

        return $this->builder->select('product.id AS id','product.*');
    }

    public function cat($value)
    {
        if (!$value) return;
        $r = $this->builder->leftjoin('category_product', 'category_product.product_id', '=', 'product.id' )->where('category_product.category_id', '=', $value)->select('product.*','category_product.*');
        //dd($r);
    }
    public function age($value)
    {
        if (!$value) return;
        $colum = 'tab1.value_id';

        //$mass_id = DB::table('product_options')->where('value_id','=', $value)->get();

        $r = $this->builder->leftjoin('product_options as tab1', 'tab1.product_id', '=', 'product.id' )->where($colum, '=', $value);
        //dd($r);
    }
    public function size($value)
    {
        if (!$value) return;
        $colum = 'tab2.value_id';
        $r = $this->builder->leftjoin('product_options as tab2', 'tab2.product_id', '=', 'product.id' )
            ->where($colum, '=', $value)->whereIn('tab2.product_id',$this->builder->get()->pluck('product_id')->toArray());
        //dd($r->get());
    }
    public function filters()
    {
        return $this->request->all();
    }
}

//SELECT opt1.*, opt2.value, opt2.value_id
//FROM product_options AS opt1
//LEFT JOIN product_options AS opt2 ON opt2.product_id = opt1.product_id
//AND opt2.value = 'дорослий'
//AND opt2.option_id=4
//WHERE ((opt1.option_id = 3)
//    AND (opt1.value = 'малий')
//    AND (opt1.product_id IN (SELECT product_id FROM product_options WHERE ((option_id=4) AND (value = 'дорослий')))))