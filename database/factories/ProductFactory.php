<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'supplier_id' => Supplier::factory(),

            'name' => $this->faker->words(2, true),
            'sku' => strtoupper(Str::random(8)),
            'barcode' => $this->faker->ean13(),

            'purchase_price' => $this->faker->randomFloat(2, 100, 1000),
            'selling_price' => $this->faker->randomFloat(2, 200, 1500),

            'quantity' => $this->faker->numberBetween(1, 500),
            'unit' => $this->faker->randomElement(['pcs', 'kg', 'box', 'ltr']),

            'description' => $this->faker->sentence(),

            'status' => $this->faker->boolean(90),

        ];
    }
}
