<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Invoice;
use App\Car;
use App\User;

class InvocieInfoController extends Controller
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
        $userId = Auth::id();
        // User model.
        $user = new User;

        // Invoice model.
        $invocie = new Invoice;

        // Car model.
        $car = new Car;

        // Fileds.
        $fields = [
            'i.total_price',
            'i.pickup_date',
            'i.return_date',
            'i.car_id',
            'i.id',
            'c.mark',
            'c.model',
            'u.email',
        ];

        // Query builder.
        $invoices = DB::table($invocie->table . ' as i')
            ->select($fields)
            ->join($car->table . ' as c', 'c.id', '=', 'i.car_id')
            ->leftJoin($user->table . ' as u', 'u.id', '=', 'i.user_id')
            ->get()
        ;

        // echo '<pre>';
        // print_r($invocies);
        // die();

        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;
        $userType = $users->is_admin;

        if($userType === 1){
            return view('invoiceinfo.index', compact('invoices'));
            exit();
        } else {
            return view('blank');
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
        $invocie = Invoice::find($id);
        $invocie->delete();

        return redirect()
            ->route('invoiceinfo.index')
            ->withStatus('Invoice successfully deleted.');
    }
}
