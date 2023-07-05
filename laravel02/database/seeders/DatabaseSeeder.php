<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $users = User::factory()->count(10)
        // ->for(Group::factory()->state(['name' => 'Administrator']))
        // ->create();

        $groups = Group::factory()->count(3)->sequence(
            [
            'name' => 'Manager'
            ],
            [
            'name' => 'Staff'
            ],
            [
                'name' => 'Sale'
            ]
        )
        ->hasUsers(10)
        ->create();

        $users = User::factory()->forGroup(['name' => 'Administrator'])->create([
            'name' => 'Hoàng An Unicode',
            'email' => 'hoangan.web@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
