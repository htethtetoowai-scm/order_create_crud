<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Admin\ItemDaoInterface', 'App\Dao\Admin\ItemDao');
        $this->app->bind('App\Contracts\Dao\Admin\UserDaoInterface', 'App\Dao\Admin\UserDao');
        $this->app->bind('App\Contracts\Dao\Admin\RoleDaoInterface', 'App\Dao\Admin\RoleDao');
        $this->app->bind('App\Contracts\Dao\Admin\CategoryDaoInterface', 'App\Dao\Admin\CategoryDao');
        $this->app->bind('App\Contracts\Dao\Admin\SubCategoryDaoInterface', 'App\Dao\Admin\SubCategoryDao');
        $this->app->bind('App\Contracts\Dao\Admin\AdminDaoInterface', 'App\Dao\Admin\AdminDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Admin\ItemServiceInterface', 'App\Services\Admin\ItemService');
        $this->app->bind('App\Contracts\Services\Admin\UserServiceInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Contracts\Services\Admin\RoleServiceInterface', 'App\Services\Admin\RoleService');
        $this->app->bind('App\Contracts\Services\Admin\CategoryServiceInterface', 'App\Services\Admin\CategoryService');
        $this->app->bind('App\Contracts\Services\Admin\SubCategoryServiceInterface', 'App\Services\Admin\SubCategoryService');
        $this->app->bind('App\Contracts\Services\Admin\AdminServiceInterface', 'App\Services\Admin\AdminService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}