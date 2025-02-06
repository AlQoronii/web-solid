<?php

namespace App\Services;

use App\Repositories\RoleRepositoryInterface;
use Exception;

class RoleService {
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll(){
        try{
            return $this->roleRepository->getAll();
        }catch(Exception $e){
            throw $e;
        }
    }
}

?>