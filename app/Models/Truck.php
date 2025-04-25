<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'plate_number',
    ];
}
