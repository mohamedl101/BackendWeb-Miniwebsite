<?php

namespace Database\Factories;

use App\Models\TestRideRequest;
use App\Models\User;
use App\Models\Motorcycle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestRideRequestFactory extends Factory
{
    protected $model = TestRideRequest::class;

    public function definition(): array
    {
        return [
            'user_id'       => User::factory(),
            'motorcycle_id' => Motorcycle::factory(),
            'desired_date'  => $this->faker->dateTimeBetween('+1 day', '+2 months'),
            'comment'       => $this->faker->optional()->sentence(),
            'status'        => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
