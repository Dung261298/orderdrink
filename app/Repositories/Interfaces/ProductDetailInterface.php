<?php

namespace App\Repositories\Interfaces;

use App\Models\Product_detail;

interface ProductDetailInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Product_detail $product_detail_model); 
    public function update(Product_detail $product_detail_model);
    public function delete(Product_detail $product_detail_model);
    public function getById($id);  
    public function getByProductId($product_id);
}