<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'price',
        'stock',
    ];

    /**
     * @return mixed
     */
    public function getCategoryName(){
        $category = Category::find($this->category_id);

        return $category->name;
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
