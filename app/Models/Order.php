<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
     //relazione many-to-one
     public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
//relazione many-to-many
    public function dishes()
{
    return $this->belongsToMany(Dish::class);
}
}




  



