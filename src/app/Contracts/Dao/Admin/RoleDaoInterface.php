<?php

namespace App\Contracts\Dao\Admin;

/**
 * Interface of Data Access Object for Role
 */
interface RoleDaoInterface
{
    /**
     * To get role data
     * @return array $roleData
     */
    public function getAllRole();

    /**
     * To create new role
     * @param  Illuminate\Http\Request  $request
     */
    public function createRole($request);

    /**
     * To get role data
     * @param int $id
     * @return array $roleData
     */
    public function findRoleById($id);

    /**
     * To update role data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateRole($request, $id);

    /**
     * To delete role data
     * @param int $id
     */
    public function deleteRole($id);
}
