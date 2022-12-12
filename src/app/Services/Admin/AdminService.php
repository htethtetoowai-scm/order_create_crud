<?php

namespace App\Services\Admin;

use App\Contracts\Dao\Admin\AdminDaoInterface;
use App\Contracts\Services\Admin\AdminServiceInterface;

/**
 * Service class for Admin.
 */
class AdminService implements AdminServiceInterface
{
    /**
     * admin Dao,
     */
    private $adminDao;

    /**
     * Class Constructor
     *
     * @param adminDaoInterface
     * @return
     */
    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * To get admin data
     *
     * @return array $dashboardData
     */
    public function getAdminDataTotalCount()
    {
        $countData = $this->adminDao->getAdminDataTotalCount();
        return $countData;
    }
}