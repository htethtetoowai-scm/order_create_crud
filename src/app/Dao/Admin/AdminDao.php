<?php

namespace App\Dao\Admin;

use App\Contracts\Dao\Admin\AdminDaoInterface;
use App\Models\Category;
use App\Models\Item;
use App\Models\Role;
use App\Models\SubCategory;
use App\Models\User;

/**
 * Data Access Object for Admin
 */
class AdminDao implements AdminDaoInterface
{
    /**
     * To get admin data
     *
     * @return array $dashboardData
     */
    public function getAdminDataTotalCount()
    {
        $counts['Users'] = User::all()->count();
        $counts['Roles'] = Role::all()->count();
        $counts['Categories'] = Category::all()->count();
        $counts['SubCategories'] = SubCategory::all()->count();
        $counts['Items'] = Item::all()->count();
        return $counts;
    }
}