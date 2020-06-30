<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $table = 'product_details';
    protected $guarded = ['id']; //Tat ca tru id
    protected $timestamp = true;
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
} 
 