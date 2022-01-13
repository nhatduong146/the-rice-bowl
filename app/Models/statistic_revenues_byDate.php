<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statistic_revenues_byDate extends Model
{
    public $timestamps = false;
    protected $fillable = 
    ['sumRevenues', 'date'];
    protected $primaryKey = 'id';
    protected $table = 'statistic_revenue';
}
