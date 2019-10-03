<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductBrandRepository
{
    function __construct()
    {

    }

    public function getBrand()
    {
        $data = DB::table('product_brands')
        ->where('product_brands_status', 1)
        ->orderBy('created_at', 'DESC')
        ->get();

        // dd($data);

        return $data;

    }


}
