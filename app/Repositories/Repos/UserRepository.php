<?php

namespace App\Repositories\Repos;

use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

class UserRepository implements UserInterface
{
    public function getAll()
    {
        return User::all();
    }

    public function addNew(User $user_model){
        return $user_model->save();
    }
    public function update(User $user_model){
        return $user_model->update();
    }
    public function delete(User $user_model){
        return $user_model->delete();
    }
    public function getById($id){
        $user = User::findOrFail($id);
        return $user;
    } 
}