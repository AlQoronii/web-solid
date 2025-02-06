<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RoleService;

class ApiRoles extends Controller{

    private $rolesService;

    public function __construct(RoleService $rolesService)
    {
        $this->rolesService = $rolesService;
    }

}



?>