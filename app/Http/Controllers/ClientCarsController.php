<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class ClientCarsController extends Controller
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
            ->where('top_cars.is_rental', 0)
            ->get()
        ;
        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;
        $userType = $users->is_admin;


        if($userType === 0){
            return view('welcome', compact('cars'));
            exit();
        } else {
            return view('blank');
            exit();
        }
    }

    public function edit(Car $car, $id)
    {
        $cars = DB::table('top_cars')
        ->select('*')
        ->where('top_cars.id', $id)
        ->first();

        // echo '<pre>';
        // print_r($cars->ccm);
        // die();

        return view('reserved-cars.book',
            compact(
                'car',
                'cars'
            )
        );
    }
    public function update(Request $request, $id)
    {
        $userId = Auth::id();

        DB::table('top_cars')
            ->where('id', $id)
            ->update([
                'is_rental' => 1,
                'user_id' => $userId
            ])
        ;

        return redirect()->back()->with('success', 'You have successfully made a car reservation, please create your invoice.');

    }

}
