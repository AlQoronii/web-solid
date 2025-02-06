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

    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 5);
        $search = $request->get('search');
        $role = $this->userService->getAllRoles();
        $users = $this->userService->getPaginateUsers($perPage, $search);
        $user = $this->userService->getAll();
        // return response()->json($user);
        // return view('pages.user.index', compact('users', 'role', 'perPage', 'search'));
        return view('pages.user.index');
    }   

    public function create()
    {
        $roles = $this->userService->getAllRoles();
        return view('pages.user.create', ['roles' => $roles]);
    }

    public function show(string $id){
        // $user = $this->userService->getById($id);
        // if (!$user) {
        //     return $this->notificationPusher->warning('User Not Found', ['user' => $user]);
        // }
        // response()->json($user);
        return view('pages.user.show', ['user' => $id]);  
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->create($data);

        // Send success notification
        $this->notificationPusher->success('User created successfully', ['user' => $user]);
        // return redirect()->route('users.index')->with('success', 'User created successfully');
        return response()->json(['success' => true, 'message' => 'User created successfully', 'user' => $user]);
    }

    public function edit($id)
    {
        // $roles = $this->userService->getAllRoles();
        // $user = $this->userService->getById($id);
        // if (!$user) {
        //     return redirect()->route('users.index');
        // }

        // return view('pages.user.edit', compact('user', 'roles'));
        return view('pages.user.edit', ['user' => $id]);
    }

    public function update(UserRequest $request, string $id)
    {
        $data = $request->validated();
        $user = $this->userService->update($id, $data);
        if(!$user){
            return redirect()->route('users.edit', $id)->with('error', 'Email already exists');
        }
        // $this->notificationPusher->success('User updated successfully', ['user' => $user]);
        // return redirect()->route('users.index')->with('success', 'User updated successfully');
        return response()->json(['success' => true, 'message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy(string $id)
    {
        $user = $this->userService->delete($id);

        $this->notificationPusher->success('User deleted successfully', ['user' => $user]);
        // return redirect()->route('users.index')->with('success', 'User deleted successfully');
        return response()->json(['success' => true, 'message' => 'User deleted successfully', 'user' => $user]);
    }
}
