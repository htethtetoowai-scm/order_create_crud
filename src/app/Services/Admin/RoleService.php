<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\RoleDaoInterface;
use App\Contracts\Services\Admin\RoleServiceInterface;

/**
 * Service class for Role.
 */
class RoleService implements RoleServiceInterface
{
    /**
     * role Dao,
     */
    private $roleDao;

    /**
     * Class Constructor
     *
     * @param roleDaoInterface
     * @return
     */
    public function __construct(RoleDaoInterface $roleDao)
    {
        $this->roleDao = $roleDao;
    }

    /**
     * To get role data
     * @return array $roleData
     */
    public function getAllRole()
    {
        $roles = $this->roleDao->getAllRole();
        return $roles;
    }

    /**
     * To create new role
     * @param  Illuminate\Http\Request  $request
     */
    public function createRole($request)
    {
        $this->roleDao->createRole($request);
    }

    /**
     * To get role data
     * @param int $id
     * @return array $roleData
     */
    public function findRoleById($id)
    {
        return $this->roleDao->findRoleById($id);
    }

    /**
     * To update role data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateRole($request, $id)
    {
        $this->roleDao->updateRole($request, $id);
    }

    /**
     * To delete role data
     * @param int $id
     */
    public function deleteRole($id)
    {
        $this->roleDao->deleteRole($id);
    }
}
