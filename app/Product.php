<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'price',
        'stock',
        'discount',
        'product_key',
        'stock',
        'brand',
        'category_id',
        'quality',
        'status'
    ];

    /**
     * @return mixed
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
