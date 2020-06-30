<?php

namespace App\Repositories\Repos;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function addNew(Category $category_model){
        return $category_model->save();
    }
    public function update(Category $category_model){
        return $category_model->update();
    }
    public function delete(Category $category_model){
        return $category_model->delete();
    }
    public function getById($id){
        $category = Category::findOrFail($id);
        return $category;
    } 
}