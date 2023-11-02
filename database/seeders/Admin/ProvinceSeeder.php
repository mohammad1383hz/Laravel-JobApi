<?php

namespace Database\Seeders\Admin;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
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

        for ($i = 0; $i < $limit; $i++) {
            DB::table('provinces')->insert([
                'name' => $faker->name,
                'slug' => 'active',
                'code'=>'89',
                'status' => 'active',

                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
