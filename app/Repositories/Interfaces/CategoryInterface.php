<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Category $category_model); 
    public function update(Category $category_model);
    public function delete(Category $category_model);
    public function getById($id); 
}