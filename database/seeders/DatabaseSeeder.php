<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SliderSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            SliderSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
            LogoSeeder::class,
            ReviewSeeder::class,
            RolePermissionSeeder::class,

        ]);
    }
}
