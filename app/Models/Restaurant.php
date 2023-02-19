<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable = [
        'name', 'address', 'vat', 'cover_restaurants','user_id'
    ];
    //relazione one-to-one
    public function user()
    {
    return $this->belongsTo('App\User');
    }
    //relazione many-to-many

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
   //relazione one-to-many
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
      //relazione one-to-many
      public function orders()
      {
          return $this->hasMany(Order::class);
      }


}


