<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;

class CategoryTest extends TestCase
{

       use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


     public function test_category_index_page_loads_successfully()
     {
        $user = User::factory()->create([
            'role' =>'admin',

        ]);

        $response = $this->actingAs($user)->get(route('admin.Category.index'));

        $response->assertStatus(200);

    }

    public function test_category_create_page_loads_successfully()
    {
        $user = User::factory()->create([
            'role'  => 'admin',
        ]);

        $response = $this->actingAs($user)->get(route('admin.Category.show'));

        $response->assertStatus(200);
    }

    public function test_admin_can_create_category()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response  = $this->actingAs($user)
                    ->post(route('admin.Category.add'), [
                        'name' => 'Electronics',
                        'status' => '1',
                    ]);
        $response->assertRedirect(route('admin.Category.index'));

        $this->assertDatabaseHas('categories', [
            'name' =>  'Electronics',
            'status' => '1',
        ]);

    }


     public function test_category_name_is_required()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)
                        ->post(route('admin.Category.add'), [
                            'name' => '',
                            'status' => 1,
                        ]);

        $response->assertSessionHasErrors('name');

        $this->assertDatabaseMissing('categories', [
            'name' => '',
        ]);
    }

    public function test_category_edit_page_loads_successfully()
    {
        $user  = User::factory()->create([
            'role' => 'admin',

        ]);

        $category = Category::create([
            'name' => 'Electronics',
            'slug'  => 'electronics',
            'status' => '1',
        ]);

        $response = $this->actingAs($user)
        ->get(route('admin.Category.edit', $category->id));

         $response->assertStatus(200);
    }

    public function test_admin_can_update_category()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 1,
        ]);

        $response = $this->actingAs($user)
                        ->put(route('admin.Category.update', $category->id), [
                            'name' => 'Updated Electronics',
                            'status' => 1,
                        ]);

        $response->assertRedirect(route('admin.Category.index'));

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'name' => 'Updated Electronics',
        ]);
    }

     public function test_admin_can_delete_category()
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 1,
        ]);

        $response = $this->actingAs($user)
                        ->get(route('admin.Category.delete', $category->id));

        $response->assertRedirect(route('admin.Category.index'));

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }



 }


