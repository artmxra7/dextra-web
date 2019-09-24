<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:dashboard view');
    }
    public function index()
    {
        $users = DB::table('users')->count();

        return view('dashboard', compact('users'));
    }

}
