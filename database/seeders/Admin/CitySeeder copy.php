<?php

namespace Database\Seeders\Admin;

use App\Models\Province;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
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
        for ($i = 0; $i < $limit; $i++) {
            DB::table('cities')->insert([
                'name' => $faker->name,
                'slug' => 'active',
                'province_id' => $faker->randomElement($province),

                'code'=>'89',
                'status' => 'active',

                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
