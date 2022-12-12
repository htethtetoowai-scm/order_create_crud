<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\RoleDaoInterface;
use App\Models\Role;

/**
 * Data Access Object for Role
 */
class RoleDao implements RoleDaoInterface
{
    /**
     * To get role data
     * @return array $roleData
     */
    public function getAllRole()
    {
        $roles = Role::all();
        return $roles;
    }

    /**
     * To create new role
     * @param  Illuminate\Http\Request  $request
     */
    public function createRole($request)
    {
        Role::create($request->all());
    }

    /**
     * To get role data
     * @param int $id
     * @return array $roleData
     */
    public function findRoleById($id)
    {
        return Role::findOrFail($id);
    }

    /**
     * To update role data
     * @param  Illuminate\Http\Request  $request
     * @param int $id
     */
    public function updateRole($request, $id)
    {
        Role::where('id', $id)
            ->update([
                'name' => $request->input('name'),
            ]);
    }

    /**
     * To delete role data
     * @param int $id
     */
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
    }
}
