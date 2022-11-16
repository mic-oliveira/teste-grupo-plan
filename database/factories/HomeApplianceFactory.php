<?php

namespace Database\Factories;

use App\Models\HomeAppliance;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<HomeAppliance>
 */
class HomeApplianceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'voltage' => 110,
            'manufacturer_id' => 1
        ];
    }
}
