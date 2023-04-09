<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\CarModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(640, 480, null, true, null, false, 'png'),
            'name' => $this->faker->words(3, true),
            'year' => $this->faker->date(),
            'price' => $this->faker->randomNumber(5),
            'description' => $this->faker->words(10, true),
            'brand_id' => Brand::factory()->create()->id,
            'model_id' => CarModel::factory()->create()->id,
        ];
    }
}
