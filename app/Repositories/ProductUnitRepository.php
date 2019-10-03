<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductUnitRepository
{
    function __construct()
    {

    }

    public function getUnit()
    {
        $data = DB::table('product_unit')
        ->where('product_unit_status', 1)
        ->orderBy('created_at', 'DESC')
        ->get();

        // dd($data);

        return $data;

    }


}
