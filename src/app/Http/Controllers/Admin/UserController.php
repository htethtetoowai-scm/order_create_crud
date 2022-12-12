<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\EditUserRequest;
use App\Contracts\Services\Admin\UserServiceInterface;

class UserController extends Controller
{
    /**
     * Item Interface
     */
    private $userService;
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userService = $userServiceInterface;
    }
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->getAllUser();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  App\Http\Requests\Admin\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->userService->createUser($request);
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userService->getUserWithRole($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->userService->findUserById($id);
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified users in storage.
     *
     * @param App\Http\Requests\Admin\User\EditUserRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $this->userService->updateUser($request, $id);
        return redirect()->route('users.index')
            ->with('success', 'User edited successfully.');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')
            ->with('success', 'User Deleted successfully.');
    }
}
