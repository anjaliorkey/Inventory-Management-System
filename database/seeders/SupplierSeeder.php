<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'company_name'  => 'ABC Traders',
                'supplier_name' => 'Rajesh Sharma',
                'mobile'        => '9876543210',
                'email'         => 'abc@gmail.com',
                'gst_no'        => '27ABCDE1234F1Z5',
                'address'       => 'Manewada Road',
                'city'          => 'Nagpur',
                'state'         => 'Maharashtra',
                'pincode'       => '440034',
                'status'        => 1,
            ],
            [
                'company_name'  => 'XYZ Enterprises',
                'supplier_name' => 'Amit Patel',
                'mobile'        => '9876543211',
                'email'         => 'xyz@gmail.com',
                'gst_no'        => '27XYZAB5678K1Z2',
                'address'       => 'Besa Road',
                'city'          => 'Nagpur',
                'state'         => 'Maharashtra',
                'pincode'       => '440037',
                'status'        => 1,
            ],
            [
                'company_name'  => 'Sunrise Distributors',
                'supplier_name' => 'Neha Verma',
                'mobile'        => '9876543212',
                'email'         => 'sunrise@gmail.com',
                'gst_no'        => '27SUNRI1234A1Z9',
                'address'       => 'Dharampeth',
                'city'          => 'Nagpur',
                'state'         => 'Maharashtra',
                'pincode'       => '440010',
                'status'        => 1,
            ],
            [
                'company_name'  => 'Global Supplies',
                'supplier_name' => 'Suresh Kumar',
                'mobile'        => '9876543213',
                'email'         => 'global@gmail.com',
                'gst_no'        => '27GLOBA5678P1Z8',
                'address'       => 'Sitabuldi',
                'city'          => 'Nagpur',
                'state'         => 'Maharashtra',
                'pincode'       => '440012',
                'status'        => 0,
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
