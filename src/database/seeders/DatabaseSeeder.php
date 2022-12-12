<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory(3)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\SubCategory::factory(10)->create();
        \App\Models\Item::factory(20)->create();
        \App\Models\Order::factory(20)->create();
        \App\Models\OrderItem::factory(20)->create();

    }
}
