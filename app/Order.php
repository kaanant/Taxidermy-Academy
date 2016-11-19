<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'user_id',
        'shipment_address_id',
        'payment_type',
        'total_price',
        'shipment_phone',
        'shipment_user',
        'delivery_type',
        'billing_address_id',
        'status'
    ];
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('product_count')->withTimestamps();
    }

    public function shipmentAddress(){
        return $this->belongsTo(Address::class, 'shipment_address_id');
    }

    public function billingAddress(){
        return $this->belongsTo(Address::class, 'billing_address_id');
    }
}
