<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClientCarsController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $ret = ClientCarsController::index();

        return $ret;
    }

    /**
     * It's retunt to admin home page.
     *
     * @author Ugljesa Zivaljevic 207/2017
     */
    public function adminHome()
    {
        $user = new User;

        $query = DB::table($user->table . ' as u')
            ->select(['u.is_admin'])
            ->where('u.is_admin', 1)
            ->get()
        ;

         foreach($query as $data){
            if($data->is_admin === 1){
                return view('adminHome');
            } else{
                return view('welcome');
            }
         }

         

    }
}
