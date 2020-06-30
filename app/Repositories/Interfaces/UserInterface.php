<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(User $user_model); 
    public function update(User $user_model);
    public function delete(User $user_model);
    public function getById($id); 
}