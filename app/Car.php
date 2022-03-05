<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $table = 'top_cars';

    protected $fillable = [
        'mark',
        'model',
        'year',
        'fuel',
        'ccm',
        'power',
        'transmission',
        'category_id',
        'price_per_day',
        'description',
        'is_rental',
        'img'
    ];

    /**
     * Category id.
     */
    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function carData() {
        return $this->hasMany('App\Car');
    }
}
