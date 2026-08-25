<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Motorcycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotorcycleFactory extends Factory
{
    protected $model = Motorcycle::class;

    public function definition(): array
    {
        return [
            'brand_id'    => Brand::factory(),
            'name'        => $this->faker->word() . ' ' . $this->faker->numberBetween(125, 1200),
            'type'        => $this->faker->randomElement(['sport', 'naked', 'touring', 'cruiser', 'offroad', 'scooter']),
            'price'       => $this->faker->numberBetween(3000, 25000),
            'cc'          => $this->faker->randomElement([125, 250, 400, 600, 750, 900, 1000, 1200]),
            'description' => $this->faker->paragraph(),
            'image_url'   => null,
            'stock'       => $this->faker->numberBetween(0, 10),
        ];
    }
}
