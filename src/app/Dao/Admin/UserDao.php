<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Data Access Object for User
 */
class UserDao implements UserDaoInterface
{
    /**
     * To get user data
     * @return array $userData
     */
    public function getAllUser()
    {
        $users = User::all();
        return $users;
    }

    /**
     * To create new user
     * @param  Illuminate\Http\Request  $request
     */
    public function createUser($request)
    {
        User::create([
            'username' => $request->input('username'),
            'role_id' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'status' => 1,
        ]);
    }

    /**
     * To get user data
     * @param int $id
     * @return array $userData
     */
    public function findUserById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * To update user data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     * @return array $dashboardData
     */
    public function updateUser($request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->role_id = $request->input('role');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->status = $request->input('status');
        $user->update();
    }

    /**
     * To delete user data
     * @param int $id
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    /**
     * To get user data with Role
     * @param int $id
     * @return object User
     */
    public function getUserWithRole($id)
    {
        return User::with('role')->findOrFail($id);
    }
}
