<?php

namespace App\Repositories\Interfaces;

use App\Models\Role;

interface RoleInterface
{
	//Khai bao cac phuong thuc controller se goi
    public function getAll();
    public function addNew(Role $role_model); 
    public function update(Role $role_model);
    public function delete(Role $role_model);
    public function getById($id); 
}