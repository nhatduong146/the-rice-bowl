<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = [
        'id', 'name', 'cost', 'serviceId'
    ];

    protected $table = 'menus';

    public function Package() {
        return $this->hasMany('App\Models\Package');
    }

    public function MenuFood() {
        return $this->hasMany('App\Models\MenuFood');
    }
}
