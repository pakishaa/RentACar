<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = 'top_invoices';

    protected $fillable = [
        'total_price',
        'pickup_date',
        'return_date',
        'car_id',
        'user_id',
    ];

    /**
     * Car id.
     */
    public function cars()
    {
        return $this->belongsTo('App\Car', 'car_id');
    }

    /**
     * User id.
     */
    public function userid()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
