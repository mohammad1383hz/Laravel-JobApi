<?php

namespace Database\Seeders\Admin;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
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
            DB::table('companies')->insert([
                'name' => $faker->name,
                'phone' =>  $faker->unique()->phoneNumber(),
                'brand' => 'test',
                'web_site' => 'https://www.google.com/',
                'src_logo' => 'test',
                'status' => 'active',
                'password' => Hash::make('12345678'),

                'description' => $faker->name,
                'created_at' => \Carbon\Carbon::now(),
                'Updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
