<?php

namespace App\Repositories\Repos;

use App\Models\About;
use App\Repositories\Interfaces\AboutInterface;

class AboutRepository implements AboutInterface
{
    public function getAll()
    {
        return About::all();
    }

    public function addNew(About $about_model){
        return $about_model->save();
    }
    public function update(About $about_model){
        return $about_model->update();
    }
    public function delete(About $about_model){
        return $about_model->delete();
    }
    public function getById($id){
        $about = About::findOrFail($id);
        return $about;
    } 
}