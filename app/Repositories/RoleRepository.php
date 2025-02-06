<?php

namespace App\Repositories;

use App\Models\Role;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleRepositoryInterface
{

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Role::all(); 
    } 

}