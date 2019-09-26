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
        ->where('product_delete', 0)
        ->orderBy('product_date_create', 'DESC')
        ->get();

        // dd($data);

        return $data;

    }


}
