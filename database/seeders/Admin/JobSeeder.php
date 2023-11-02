<?php

namespace Database\Seeders\Admin;

use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Province;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $limit = 10;
        $province = Province::get()->take(10)->pluck('id');
        $city = City::get()->take(10)->pluck('id');

        $category = Category::get()->take(10)->pluck('id');
        $company = Company::get()->take(10)->pluck('id');

        for ($i = 0; $i < $limit; $i++) {
            DB::table('jobs')->insert([
                'title' => $faker->title,
                'description' => 'test description',
                'province_id' => $faker->randomElement($province),
                'city_id' => $faker->randomElement($city),
                'category_id' => $faker->randomElement($category),
                'company_id' => $faker->randomElement($company),

                'status' => 'active',

                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
