<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class ReservedInfoController extends Controller
{
    public static function index()
    {
        if(Auth::guest()){
            return view('blank');
            exit();
        }
        $user = new User;
        // User id.
        $userId = Auth::id();
        $cars = DB::table('top_cars')
            ->select('*')
            ->where('top_cars.is_rental', 1)
            ->get()
        ;
        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;
        $userType = $users->is_admin;

        if($userType === 1){
            return view('reserved-cars.reserved-cars-info', compact('cars'));
            exit();
        } else {
            return view('blank');
            exit();
        }


    }
}
