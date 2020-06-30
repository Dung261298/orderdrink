<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id']; //Tat ca tru id
    protected $timestamp = true;
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    //many to many with tags
    public function tag(){
        return $this->belongsToMany('App\Models\Tag', 'product_tags', 'product_id', 'tag_id');
    }
    public function product_detail()
    {
    	return $this->hasOne('App\Models\Product_detail');	
    }
} 
 