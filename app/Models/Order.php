<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'userId', 'peopleNumber', 'orderDate', 'organizationDate', 'note',
        'paymentId', 'status', 'serviceId', 'menuId', 'packageId'
    ];

    public function PaymentMethod() {
        return $this->belongsTo('App\Models\PaymentMethod');
    }
    public function OrderStatus() {
        return $this->belongsTo('App\Models\OrderStatus');
    }
    public function Service() {
        return $this->belongsTo('App\Models\Service');
    }
    public function User() {
        return $this->belongsTo('App\User');
    }

    public function Menu() {
        return $this->belongsTo('App\Models\Menu');
    }

    public function Package() {
        return $this->belongsTo('App\Models\Package');
    }

    // protected $casts = [
    //     'orderDate' => 'date:Y-m-d',
    //     'organizationDate' => 'datetime:Y-m-d H:00',
    // ];

}
