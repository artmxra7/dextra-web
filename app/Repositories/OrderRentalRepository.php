<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderRentalRepository
{


    public function getRentalOrder()
    {


        $data = DB::table('order_rental')
        ->select('*')
        ->get();

        return $data;
    }
}
