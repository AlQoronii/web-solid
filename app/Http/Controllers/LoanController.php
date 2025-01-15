<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanRequest;
use App\Services\LoanService;
use App\Services\Notifications\NotificationPusher;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $loanService;
    protected $notificationPusher;

    public function __construct(LoanService $loanService, NotificationPusher $notificationPusher)
    {
        $this->loanService = $loanService;
        $this->notificationPusher = $notificationPusher;
    }

    public function index()
    {

        $loans = $this->loanService->getAll();
        response()->json($loans);
        return view('pages.loan.index', compact('loans'));
    }

    public function create()
    {
        // return view('loans.create');
    }

    public function show(string $id){
        $loan = $this->loanService->getById($id);
        if (!$loan) {
            return $this->notificationPusher->warning('Loan Not Found', ['loan' => $loan]);
        }
        return response()->json($loan);
    }

    public function store(LoanRequest $request)
    {
        $data = $request->validated();

        $loan = $this->loanService->create($data);

        // Send success notification
        return $this->notificationPusher->success('Loan created successfully', ['loan' => $loan]);
    }

    public function edit($id)
    {
        $loan = $this->loanService->getById($id);
        if (!$loan) {
            return redirect()->route('loans.index');
        }

        return view('loans.edit', compact('loan'));
    }

    public function update(LoanRequest $request, string $id)
    {
        $data = $request->validated();

        $loan = $this->loanService->update($id, $data);

        return $this->notificationPusher->success('Loan updated successfully', ['loan' => $loan]);
    }

    public function destroy(string $id)
    {
        $loan = $this->loanService->delete($id);

        return $this->notificationPusher->success('Loan deleted successfully', ['loan' => $loan]);
    }
}
