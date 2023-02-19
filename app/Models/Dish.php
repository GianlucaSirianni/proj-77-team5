<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';

    protected $fillable = [
        'name','ingredients','description','price','cover_dish','restaurant_id'
    ];

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
