<?php

namespace Database\Factories;

use App\Models\supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'supplier_name' => fake()->name(),
            'mobile'        => fake()->unique()->numerify('98########'),
            'email'         => fake()->safeEmail(),
            'gst_no'        => '27ABCDE1234F1Z5',
            'address'       => fake()->address(),
            'city'          => fake()->city(),
            'state'         => fake()->state(),
            'pincode'       => fake()->postcode(),
            'status'        => 1,
        ];
    }
}
