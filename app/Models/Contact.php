<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'first_name',
        'last_name',
        'birth_date',
        'function',
        'phone',
        'address',
        'city',
        'company'
    ];
}
