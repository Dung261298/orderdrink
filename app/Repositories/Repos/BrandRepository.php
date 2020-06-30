<?php

namespace App\Repositories\Repos;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandInterface;

class BrandRepository implements BrandInterface
{
    public function getAll()
    {
        return Brand::where('isdelete', '=', 0)->get();
    }

    public function addNew(Brand $brand_model){
        return $brand_model->save();
    }
    public function update(Brand $brand_model){
        return $brand_model->update();
    }
    public function delete(Brand $brand_model){
        return $brand_model->delete();
    }
    public function getById($id){
        $brand = Brand::findOrFail($id);
        return $brand;
    } 
}