<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Group::class;


    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
