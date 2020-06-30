<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;

interface ProductInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Product $product_model); 
    public function update(Product $product_model);
    public function delete(Product $product_model);
    public function getById($id);  
    public function getBySlug($slug); 
}