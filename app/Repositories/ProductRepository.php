<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductRepository
{
    function __construct()
    {

    }

    public function getProduct()
    {
        $data = DB::table('products')
        ->select(

        'products.title',
        'products.no_product',
        'products.sn_product',
        'products.photo_highlight',
        'products.description',
        'products.is_active',
        'products.is_active',
        'products.price_piece',
        'products.price_box',
        'products.photo',
        'products.product_brand_id',

         'pb.id',
         'pb.product_brands_name')
        ->leftJoin('product_brands as pb', DB::raw('BINARY products.product_brand_id'), '=', DB::raw('BINARY pb.id'))
        ->where('product_delete', 0)
        ->orderBy('product_date_create', 'DESC')
        ->get();

        // dd($data);

        return $data;

    }


}
