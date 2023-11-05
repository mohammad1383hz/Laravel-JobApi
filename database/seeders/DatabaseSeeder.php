<?php

namespace Database\Seeders;

use Database\Seeders\Admin\CategorySeeder;
use Database\Seeders\Admin\CitySeeder;
use Database\Seeders\Admin\CompanySeeder;
use Database\Seeders\Admin\JobSeeder;
use Database\Seeders\Admin\ProvinceSeeder;
use Database\Seeders\Admin\SkillSeeder;
use Database\Seeders\Admin\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(
            [

                CategorySeeder::class,
ProvinceSeeder::class,
CitySeeder::class,
SkillSeeder::class,
UserSeeder::class,
CompanySeeder::class,
JobSeeder::class,
CompanySeeder::class,
                // AboutSeeder::class,
                // PropertySeeder::class,
                // ProvinceSeeder::class,
            ]
        );

    }
}
