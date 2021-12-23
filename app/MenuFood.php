<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuFood extends Model
{
    protected $table = 'menufood';

    protected $fillable = [
        'menuId', 'foodId'
    ];
}
