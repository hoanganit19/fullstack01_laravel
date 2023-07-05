<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Administrator'
            ],
            [
                'name' => 'Manager'
            ],
            [
                'name' => 'Staff'
            ],
            [
                'name' => 'Sale'
            ]
        ];

        Group::insert($groups);
    }
}
