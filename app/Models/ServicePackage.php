<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePackage extends Model
{
    //
    protected $fillable = [
        'name', 'price',
        'background', 'serviceId',
        'menuId', 'content'
    ];
}
