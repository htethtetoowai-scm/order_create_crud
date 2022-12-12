<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Admin\AdminServiceInterface;

class AdminController extends Controller
{
    /**
     * Item Service Interface
     */
    private $adminService;
    public function __construct(AdminServiceInterface $adminServiceInterface) {
        $this->adminService = $adminServiceInterface;
    }
    /**
     * Display count of users, roles, categories, subcategories, items
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = $this->adminService->getAdminDataTotalCount();
        $class = ['bg-grow-early', 'bg-arielle-smile', 'bg-midnight-bloom'];
        return view('admin.dashboard.index', compact('counts', 'class'));
    }
}
