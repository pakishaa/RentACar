<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = 'top_car_categories';

    protected $fillable = [
        'name'
    ];

    /**
     * Show data in cars.
     */
    public function car() {
        return $this->hasMany('App\Categories');
    }
}
