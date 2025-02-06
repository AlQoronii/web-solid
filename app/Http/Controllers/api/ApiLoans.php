<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LoanService;

class ApiLoans extends Controller{

    private $loansService;

    public function __construct(LoanService $loansService)
    {
        $this->loansService = $loansService;
    }

    public function index()
    {
        $loans = $this->loansService->getAll(); // Pastikan relasi dimuat
        return response()->json($loans);
    }

    public function show($id)
    {
        $loan = $this->loansService->getById($id);
        if (!$loan) {
        response()->json(['message' => 'Loan not found'], 404);
        }
        return response()->json($loan);    
    }

}

?>