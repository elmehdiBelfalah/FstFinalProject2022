<?php

namespace Database\Seeders;

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
        \App\Models\Brand::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Product::factory(72)->create();
        \App\Models\User::factory(1)->create();
    }
}
