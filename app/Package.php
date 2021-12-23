<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';

    protected $fillable = [
        'id', 'name', 'price', 'detail', 'background', 'serviceId'
    ];
}
