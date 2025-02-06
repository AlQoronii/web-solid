<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    private $roleService;

    public function __construct(RoleService $roleService)
    {   
        $this->roleService = $roleService;
    }

    public function index(){
        $role = $this->roleService->getAll();
        return response()->json($role);
        
    }
}
