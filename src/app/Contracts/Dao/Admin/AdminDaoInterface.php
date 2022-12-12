<?php

namespace App\Contracts\Dao\Admin;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for Admin
 */
interface AdminDaoInterface
{
    /**
     * To get admin data
     *
     * @return array $dashboardData
     */
    public function getAdminDataTotalCount();
}