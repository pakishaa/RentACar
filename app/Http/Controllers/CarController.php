<?php

namespace App\Http\Controllers;

use App\Car;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\CarRequest;

class CarController extends Controller
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

        // User model.
        $user = new User;
        // User id.
        $userId = Auth::id();
        $cars = Car::paginate(25);
        // Check this user is admin or not.
        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;
        $userType = $users->is_admin;


        if($userType === 1){
            return view('cars.index', compact('cars'));
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
        $categories = Categories::all();

        return view('cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request, Car $car)
    {
       $input = $request->all();

        if($request->hasFile('img')){
            $destinationPath = 'public/images/car';
            $image = $request->file('img');
            $imageName =  $image->getClientOriginalName();

            $path = $request->file('img')
                ->storeAs($destinationPath, $imageName)
            ;


            $input['img'] = $imageName;
        }

        Car::create($input);
        return redirect()
            ->route('cars.index')
            ->withStatus('Cars successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car, Request $request)
    {
        $params = $request->all();

        $car = new Car;

        $q = DB::table($car->table . ' as c')
        ->select('c.id')
        ->where('c.id', $params['id'])
        ->first();
        print_r($q);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $categories = Categories::all();
        return view('cars.edit',
            compact(
                'car',
                'categories'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, Car $car)
    {
        $id = $car->id;
        echo $id;
        die();
        $car->update($request->all());

        return redirect()
            ->route('cars.index')
            ->withStatus('Car successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect()
            ->route('cars.index')
            ->withStatus('Category successfully deleted.');
    }
}
