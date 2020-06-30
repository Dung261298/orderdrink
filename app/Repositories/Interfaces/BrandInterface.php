<?php

namespace App\Repositories\Interfaces;

use App\Models\Brand;

interface BrandInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Brand $brand_model); 
    public function update(Brand $brand_model);
    public function delete(Brand $brand_model);
    public function getById($id); 
}