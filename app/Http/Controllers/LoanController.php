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

    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 5);
        $search = $request->get('search');
        $loans = $this->loanService->getPaginateLoan($perPage, $search);
        response()->json($loans);
        return view('pages.loan.index', compact('loans', 'perPage', 'search'));
    }

    public function create()
    {
        $users = $this->loanService->getAllUsers();
        $books = $this->loanService->getAllBooks();
        return view('pages.loan.create', compact('users', 'books'));
    }

    public function show(string $id){

        $users = $this->loanService->getAllUsers();
        $books = $this->loanService->getAllBooks();
        $loan = $this->loanService->getById($id);
        if (!$loan) {
            return $this->notificationPusher->warning('Loan Not Found', ['loan' => $loan]);
        }
        response()->json($loan);
        return view('pages.loan.show', compact('loan', 'users', 'books'));
    }

    public function store(LoanRequest $request)
    {
        $data = $request->validated();

        $loan = $this->loanService->create($data);

        // Send success notification
        $this->notificationPusher->success('Loan created successfully', ['loan' => $loan]);
        return redirect()->route('loans.index')->with('success', 'Loan created successfully');;
    }

    public function edit($id)
    {
        $users = $this->loanService->getAllUsers();
        $books = $this->loanService->getAllBooks();
        $loan = $this->loanService->getById($id);
        if (!$loan) {
            return redirect()->route('loans.index');
        }

        return view('pages.loan.edit', compact('loan', 'users', 'books'));
    }

    public function update(LoanRequest $request, string $id)
    {
        
        $data = $request->validated();

        $loan = $this->loanService->update($id, $data);

        $this->notificationPusher->success('Loan updated successfully', ['loan' => $loan]);
        return redirect()->route('loans.index')->with('success', 'Loan updated successfully');;
    }

    public function destroy(string $id)
    {
        $loan = $this->loanService->delete($id);

        $this->notificationPusher->success('Loan deleted successfully', ['loan' => $loan]);
        return redirect()->route('loans.index')->with('success', 'Loan deleted successfully');;
    }
}
