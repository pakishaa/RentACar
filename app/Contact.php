<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contact_form';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
      protected $fillable = [
        'name', 'email', 'subject', 'mobile_number', 'message'
    ];
}
