<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Services\Notifications\NotificationPusher;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $notificationPusher;

    public function __construct(UserService $userService, NotificationPusher $notificationPusher)
    {
        $this->userService = $userService;
        $this->notificationPusher = $notificationPusher;
    }

    public function index()
    {
        $role = $this->userService->getAllRoles();
        $users = $this->userService->getAll();
        response()->json($users);
        return view('pages.user.index', compact('users', 'role'));
    }

    public function create()
    {
        $roles = $this->userService->getAllRoles();
        return view('pages.user.create', ['roles' => $roles]);
    }

    public function show(string $id){
        $user = $this->userService->getById($id);
        if (!$user) {
            return $this->notificationPusher->warning('User Not Found', ['user' => $user]);
        }
        response()->json($user);
        return view('pages.user.show', ['user' => $user]);  
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->create($data);

        // Send success notification
        $this->notificationPusher->success('User created successfully', ['user' => $user]);
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $roles = $this->userService->getAllRoles();
        $user = $this->userService->getById($id);
        if (!$user) {
            return redirect()->route('users.index');
        }

        return view('pages.user.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, string $id)
    {
        $data = $request->validated();
        $user = $this->userService->update($id, $data);
        if(!$user){
            return redirect()->route('users.edit', $id)->with('error', 'Email already exists');
        }
        $this->notificationPusher->success('User updated successfully', ['user' => $user]);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = $this->userService->delete($id);

        $this->notificationPusher->success('User deleted successfully', ['user' => $user]);
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
