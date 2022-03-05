<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeCarsController extends Controller
{
    public function index()
    {
        $cars = DB::table('top_cars')
        ->select('*')
        ->where('top_cars.is_rental', 0)
        ->get();


        return view('welcome', compact('cars'));
    }
}
