<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'image'
    ];

    public function MenuFood() {
        return $this->hasMany('App\Models\MenuFood');
    }
}
