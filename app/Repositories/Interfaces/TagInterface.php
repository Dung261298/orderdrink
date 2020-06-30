<?php

namespace App\Repositories\Interfaces;

use App\Models\Tag;

interface TagInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Tag $tag_model); 
    public function update(Tag $tag_model);
    public function delete(Tag $tag_model);
    public function getById($id); 
}