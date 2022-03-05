<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Controllers\ReservedInfoController as InfoCarClass;


class ReservedCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            return view('blank');
            exit();
        }

        $user = new User;

        $userId = Auth::id();

        $reservedcars = DB::table('top_cars')
            ->select('*')
            ->where('top_cars.user_id', $userId)
            ->where('top_cars.is_rental',1)
            ->get()
        ;

        // echo '<pre>';
        // print_r($reservedcars);
        // die();

        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;
        $userType = $users->is_admin;

        if($userType === 0){
            return view('reserved-cars.cars-list', compact('reservedcars'));
            exit();
        } else {
            return InfoCarClass::index();
            exit();
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
