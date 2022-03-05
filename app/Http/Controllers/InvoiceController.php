<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Invoice;
use Illuminate\Support\Facades\Auth;
use App\Car;
use App\User;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invocie = new Invoice;

        $car = new Car;

        $userId = Auth::id();

        $fields = [
            'i.total_price',
            'i.pickup_date',
            'i.return_date',
            'i.car_id',
            'i.id',
            'c.mark',
            'c.model'
        ];

        $cars = DB::table($invocie->table . ' as i')
            ->select($fields)
            ->where('c.user_id', $userId)
            ->join($car->table . ' as c', 'c.id', '=', 'i.car_id')
            ->get()
        ;

        // echo '<pre>';
        // print_r($cars);
        // die();

        return view('invoice.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();

        $cr = DB::table('top_cars')
            ->select('*')
            ->where('top_cars.user_id', $userId)
        ;

        $cars = json_decode(json_encode($cr->get()), true);


        $userid = User::all();
        return view('invoice.create', compact('cars', 'userid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Car $car)
    {
        $car = new Car;
        $invoice = new Invoice;
        $userId = Auth::id();

        //////////////////////////////////////////////////
        // Total days and total price
        //////////////////////////////////////////////////
        $carId = $request->get('car_id');
        $priceQuery = DB::table($car->table . ' as c')
            ->select('c.price_per_day')
            ->where('c.id', $carId)
            ->first()
        ;
        $price = $priceQuery->price_per_day;
        $time1 = strtotime($request->get('pickup-date'));
        $time2 = strtotime($request->get('return-date'));
        $totalDays = $time2 - $time1;
        $total = round($totalDays / (60 * 60 * 24));
        $totalPrice = $price * $total;
        // echo $totalPrice;
        // die();
        //////////////////////////////////////////////////

        $invoice->pickup_date = $request->get('pickup-date');
        $invoice->return_date = $request->get('return-date');
        $invoice->car_id = $carId;
        $invoice->total_price = $totalPrice;
        $invoice->user_id = $userId;

        $invoice->save();

        return redirect()
            ->route('invoice.index')
            ->withStatus('Invoice successfuly created!')
        ;

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
