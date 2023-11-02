<?php

namespace Database\Seeders\Admin;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
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
        $category = Category::get()->take(10)->pluck('id');
        for ($i = 0; $i < $limit; $i++) {
            DB::table('skills')->insert([
                'name' => $faker->name,
                'slug' => 'test',
                'category_id' => $faker->randomElement($category),
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
