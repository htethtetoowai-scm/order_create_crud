<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for Admin service.
 */
interface AdminServiceInterface
{
    /**
     * To get admin data
     *
     * @return array $dashboardData
     */
    public function getAdminDataTotalCount();
}