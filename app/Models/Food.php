<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';
    //
    protected $fillable = [
        'id', 'name', 'background'
    ];

    public function MenuFood()
    {
        return $this->hasMany('App\Models\MenuFood');
    }
}
