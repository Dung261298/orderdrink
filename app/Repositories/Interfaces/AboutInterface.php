<?php

namespace App\Repositories\Interfaces;

use App\Models\About;

interface AboutInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(About $about_model); 
    public function update(About $about_model);
    public function delete(About $about_model);
    public function getById($id); 
}