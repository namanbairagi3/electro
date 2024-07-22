<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    //1. Properties
    //2. Constructor
    //3. Method
    public function filter(){
        $brands = DB::table('brands')
        ->leftJoin('products', 'brands.id', '=', 'products.brand_id')
        /* ->select('brands.*', DB::raw('COUNT(products.id) as products_count'))
        ->groupBy('brands.id') */
        ->get();
        return view('shop/shop-grid',['brands',$brands]);
    }
}
