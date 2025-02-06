<?php

namespace App\Repositories;

interface RoleRepositoryInterface{
    
    public function getAll(): \Illuminate\Database\Eloquent\Collection;
}

?>