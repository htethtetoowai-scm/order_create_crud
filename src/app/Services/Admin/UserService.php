<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\UserDaoInterface;
use App\Contracts\Services\Admin\UserServiceInterface;

/**
 * Service class for User.
 */
class UserService implements UserServiceInterface
{
    /**
     * user Dao,
     */
    private $userDao;

    /**
     * Class Constructor
     *
     * @param userDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * To get user data
     * @return array $userData
     */
    public function getAllUser()
    {
        $users = $this->userDao->getAllUser();
        return $users;
    }

    /**
     * To create new user
     * @param  Illuminate\Http\Request  $request
     */
    public function createUser($request)
    {
        $this->userDao->createUser($request);
    }

    /**
     * To get user data
     * @param int $id
     * @return array $userData
     */
    public function findUserById($id)
    {
        return $this->userDao->findUserById($id);
    }

    /**
     * To update user data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateUser($request, $id)
    {
        $this->userDao->updateUser($request, $id);
    }

    /**
     * To delete user data
     * @param int $id
     */
    public function deleteUser($id)
    {
        $this->userDao->deleteUser($id);
    }

    /**
     * To get user data with Role
     * @param int $id
     * @return object material
     */
    public function getUserWithRole($id)
    {
        return $this->userDao->getUserWithRole($id);
    }
}
