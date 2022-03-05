<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
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

        $users = DB::table($user->table . ' as u')
            ->select('u.is_admin')
            ->where('u.id', $userId)
            ->first()
        ;

        $categories = Categories::paginate(25);

        $userType = $users->is_admin;

        if($userType === 1){
            return view('categories.index', compact('categories'));
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
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Categories $categories)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $categories->create($request->all());

        return redirect()
            ->route('categories.index')
            ->withStatus('Car category successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Categories::find($id);
        $contact->delete();

        return redirect()
            ->route('categories.index')
            ->withStatus('Category successfully deleted.');
    }
}
