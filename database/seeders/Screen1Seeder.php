<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Screen1;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Screen1Factory;

class Screen1Seeder extends Seeder
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Screen1::class;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Screen1::factory()->count(50)->create();
    }
}