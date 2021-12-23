<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageCriteria extends Model
{
    protected $table = 'packagecriteria';

    protected $fillable = [
        'packageId', 'criteriaId'
    ];
}
