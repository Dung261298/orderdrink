<?php

namespace App\Repositories\Repos;

use App\Models\Product;
use App\Repositories\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function addNew(Product $product_model){
        return $product_model->save();
    }
    public function update(Product $product_model){
        return $product_model->update();
    }
    public function delete(Product $product_model){
        return $product_model->delete();
    }
    public function getById($id){
        $product = Product::findOrFail($id);
        return $product;
    }
    public function getBySlug($slug){
        $id = Product::where('slug',$slug)->first();
        $product = Product::findOrFail($id->id);
        return $product;
    }  
}