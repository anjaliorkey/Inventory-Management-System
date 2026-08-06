<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::first();
        $supplier = Supplier::first();

        if (!$category || !$supplier) {
            return;
        }

        Product::create([
            'category_id'     => $category->id,
            'supplier_id'     => $supplier->id,
            'name'            => 'HP Laptop',
            'sku'             => 'HP001',
            'barcode'         => '1234567890123',
            'purchase_price'  => 45000,
            'selling_price'   => 50000,
            'quantity'        => 15,
            'unit'            => 'pcs',
            'image'           => null,
            'description'     => 'HP Core i5 Laptop',
            'status'          => 1,
        ]);

        Product::create([
            'category_id'     => $category->id,
            'supplier_id'     => $supplier->id,
            'name'            => 'Dell Mouse',
            'sku'             => 'DM002',
            'barcode'         => '9876543210123',
            'purchase_price'  => 350,
            'selling_price'   => 500,
            'quantity'        => 100,
            'unit'            => 'pcs',
            'image'           => null,
            'description'     => 'Wireless Mouse',
            'status'          => 1,
        ]);
    }
}
