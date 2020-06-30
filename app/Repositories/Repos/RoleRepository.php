<?php

namespace App\Repositories\Repos;

use App\Models\Role;
use App\Repositories\Interfaces\RoleInterface;

class RoleRepository implements RoleInterface
{
    public function getAll()
    {
        return Role::all();
    }

    public function addNew(Role $role_model){
        return $role_model->save();
    }
    public function update(Role $role_model){
        return $role_model->update();
    }
    public function delete(Role $role_model){
        return $role_model->delete();
    }
    public function getById($id){
        $role = Role::findOrFail($id);
        return $role;
    } 
}