<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
     use RefreshDatabase;

     protected User $user;
     protected Category $category;
     protected Supplier $supplier;

     protected function setup():void
     {
        parent::setUp();

        $this->user     = User::factory()->create();

        $this->category = Category::factory()->create([
            'status' => 1,
        ]);

        $this->supplier = Supplier::factory()->create([
            'status' =>1,
        ]);
     }





}
