<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable = [
        'name', 'address', 'vat', 'photo','user_id'
    ];

    public function user()
    {
    return $this->belongsTo('App\User');
    }   
}


