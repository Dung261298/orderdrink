<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $guarded = ['id'];
    protected $timestrap = true;

    //relationship with post model many to many
    public function product(){
        return $this->belongsToMany('App\Models\Product','products_tag','tag_id', 'product_id');
    }
}
