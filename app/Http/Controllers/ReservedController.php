<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservedController extends Controller
{
    public static function index()
    {



        return view('reservedcars.index');
    }
}
