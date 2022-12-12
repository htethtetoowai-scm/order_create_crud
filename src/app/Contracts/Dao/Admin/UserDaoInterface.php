<?php

namespace App\Contracts\Dao\Admin;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for User
 */
interface UserDaoInterface
{
    /**
     * To get user data
     * @return array $userData
     */
    public function getAllUser();

    /**
     * To create new user
     * @param  Illuminate\Http\Request  $request
     */
    public function createUser($request);

    /**
     * To get user data
     * @param int $id
     * @return array $userData
     */
    public function findUserById($id);

    /**
     * To update user data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     * @return array $dashboardData
     */
    public function updateUser($request, $id);

    /**
     * To delete user data
     * @param int $id
     */
    public function deleteUser($id);

    /**
     * To get user data with Role
     * @param int $id
     * @return object user
     */
    public function getUserWithRole($id);
}
