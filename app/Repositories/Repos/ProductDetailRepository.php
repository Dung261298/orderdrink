<?php

namespace App\Repositories\Repos;

use App\Models\Product_detail;
use App\Repositories\Interfaces\ProductDetailInterface;

class ProductDetailRepository implements ProductDetailInterface
{
    public function getAll()
    {
        return Product_detail::all();
    }

    public function addNew(Product_detail $product_detail_model){
        return $product_detail_model->save();
    }
    public function update(Product_detail $product_detail_model){
        return $product_detail_model->update();
    }
    public function delete(Product_detail $product_detail_model){
        return $product_detail_model->delete();
    }
    public function getById($id){
        $product_detail = Product_detail::findOrFail($id);
        return $product_detail;
    }  
    public function getByProductId($product_id){
        $product_details = Product_detail::where('product_id',$product_id)->get();
        return $product_details;
    }  
}