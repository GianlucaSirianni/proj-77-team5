<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    
    //relazione many-to-one
     public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    //relazione many-to-many
    public function orders()
    {
    return $this->belongsToMany(Order::class);
    }

   
}
