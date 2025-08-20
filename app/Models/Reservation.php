<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'reserved_date',
        'reserved_time',
        'number_of_people',
        'note',
    ];
}
