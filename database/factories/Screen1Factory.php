<?php

namespace Database\Factories;

use App\Models\Screen1;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Screen1>
 */
class Screen1Factory extends Factory
{

    protected $model = Screen1::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'The cats and the dogs',
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'notes' => $this->faker->paragraph(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
