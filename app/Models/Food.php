<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    //
    protected $fillable = [
        'id', 'name', 'image', 'price'
    ];

    public function MenuFood()
    {
        return $this->hasMany('App\Models\MenuFood');
    }
}
