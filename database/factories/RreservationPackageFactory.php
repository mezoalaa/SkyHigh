<?php

namespace Database\Factories;

use App\Models\RreservationPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=RreservationPackage>
 */
class RreservationPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model=RreservationPackage::class;
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true), // Generate a string of 3 words
            'price' => $this->faker->randomFloat(2, 100, 10000), // Generate a random decimal between 100 and 10000
            'country' => $this->faker->country,
            'description' => $this->faker->paragraph,
            'startDate' => $this->faker->date(), // Generate a date string
            'endtDate' => $this->faker->date(), // Generate a date string
        ];
    }
}
