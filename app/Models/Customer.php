<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'location_id'
        ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
