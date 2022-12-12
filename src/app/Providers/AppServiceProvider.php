<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

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
        $this->app->bind('App\Contracts\Dao\API\OrderDaoInterface', 'App\Dao\API\OrderDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Admin\ItemServiceInterface', 'App\Services\Admin\ItemService');
        $this->app->bind('App\Contracts\Services\Admin\UserServiceInterface', 'App\Services\Admin\UserService');
        $this->app->bind('App\Contracts\Services\Admin\RoleServiceInterface', 'App\Services\Admin\RoleService');
        $this->app->bind('App\Contracts\Services\Admin\CategoryServiceInterface', 'App\Services\Admin\CategoryService');
        $this->app->bind('App\Contracts\Services\Admin\SubCategoryServiceInterface', 'App\Services\Admin\SubCategoryService');
        $this->app->bind('App\Contracts\Services\Admin\AdminServiceInterface', 'App\Services\Admin\AdminService');
        $this->app->bind('App\Contracts\Services\API\OrderServiceInterface', 'App\Services\API\OrderService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Debug log for SQL
        DB::listen(
            function ($sql) {
                foreach ($sql->bindings as $i => $binding) {
                    if ($binding instanceof \DateTime) {
                        $sql->bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                    } else {
                        if (is_string($binding)) {
                            $sql->bindings[$i] = "'$binding'";
                        }
                    }
                }
                // Insert bindings into query
                $query = str_replace(['%', '?'], ['%%', '%s'], $sql->sql);
                $query = vsprintf($query, $sql->bindings);
                Log::info($query);
            }
        );
    }
}
