<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $users = [
            [
                'name' => 'Hoàng An',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'group_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        for ($i = 1; $i<=100; $i++) {
            $users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => Hash::make($faker->password),
                'group_id' => $faker->biasedNumberBetween(1, 4),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        User::insert($users);
    }
}
