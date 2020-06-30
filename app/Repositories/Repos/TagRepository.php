<?php

namespace App\Repositories\Repos;

use App\Models\Tag;
use App\Repositories\Interfaces\TagInterface;

class TagRepository implements TagInterface
{
    public function getAll()
    {
        return Tag::all();
    }

    public function addNew(Tag $tag_model){
        return $tag_model->save();
    }
    public function update(Tag $tag_model){
        return $tag_model->update();
    }
    public function delete(Tag $tag_model){
        return $tag_model->delete();
    }
    public function getById($id){
        $tag = Tag::findOrFail($id);
        return $tag;
    } 
}