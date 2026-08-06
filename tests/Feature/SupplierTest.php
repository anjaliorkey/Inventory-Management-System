<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Routing\RouteRegistrar;

class SupplierTest extends TestCase
{

  use  RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_supplier_index_page_loads_successfully()
    {
          $user = User::factory()->create([
            'role' => 'admin',

          ]);

          $response = $this->actingAs($user)->get(route('admin.supplier.index'));

          $response->assertStatus(200);
    }

    public function test_supplier_create_page_loads_successfully()
    {
          $user = User::factory()->create([
            'role' => 'admin',

          ]);

          $response = $this->actingAs($user)->get(route('admin.supplier.show'));

          $response->assertStatus(200);

    }

     public function test_admin_can_create_supplier()
     {
         //Arrange

           $user = User::factory()->create([
            'role' => 'admin',
           ]);


           $supplierData = ([

            'company_name'  => 'ABC PVt Ltd',
            'supplier_name' => 'Rahul Sharma',
            'mobile'        => '9876543210',
            'email'         =>  'rahul@gmail.com',
            'gst_no'        => '27ABCDE1234F1Z5',
            'address'       => 'Besa Road',
            'city'          => 'jalgav',
            'state'         => 'Maharashtra',
            'pincode'       => '440034',
            'status'        => 1,
           ]);

           //Act

            $response = $this->actingAs($user)->post(route('admin.supplier.add'), $supplierData);

           //Assert
           $response->assertRedirect(route('admin.supplier.index'));

           $this->assertDatabaseHas('suppliers', [
             'company_name'  => 'ABC PVt Ltd',
             'supplier_name' => 'Rahul Sharma',
             'mobile'        => '9876543210',
             'email'         => 'rahul@gmail.com',
             'city'          => 'jalgav',
             'status'        => 1,
           ]);
     }

    public function test_supplier_validation_fails_when_required_fields_are_empty()
    {
         //Arrange
          $user = User::factory()->create([
            'role' => 'admin',
          ]);

         //Act
         $response = $this->actingAs($user)
                      ->post(route('admin.supplier.add'));

         //Assert
         $response->assertSessionHasErrors([
            'company_name',
             'supplier_name',
             'mobile',
             'email',
             'city',
             'status',
         ]);
    }

    public function test_supplier_edit_page_loads_successfully()
    {
        //Arrange
          $user = User::factory()->create([
            'role' => 'admin',
          ]);

          $supplier = Supplier::factory()->create();

        //Act
        $response = $this->actingAs($user)
                     ->get(route('admin.supplier.edit' , $supplier->id));

        //Assert
         $response->assertStatus(200);
    }

    public function  test_admin_can_update_supplier()
    {
        //Arrange
          $user = User::factory()->create([
            'role' =>'admin',
          ]);

          $supplier = Supplier::factory()->create();

        //Act
         $response = $this->actingAs($user)
                      ->put(route('admin.supplier.update', $supplier->id), [

                        'company_name'  => 'XYZ Pvt Ltd',
                        'supplier_name' => 'Amit Kumar',
                        'mobile'        => '9999999999',
                        'email'         => 'amit@gmail.com',
                        'gst_no'        => '27ABCDE1234F1Z5',
                        'address'       => 'Sitabuldi',
                        'city'          => 'Nagpur',
                        'state'         => 'Maharashtra',
                        'pincode'       => '440001',
                        'status'        => 1,

                      ]);

        //Assert
        $response->assertRedirect(route('admin.supplier.index'));

        $this->assertDatabaseHas('suppliers', [
            'id' => $supplier->id,
            'company_name'  => 'XYZ Pvt Ltd',
            'supplier_name' => 'Amit Kumar',
            'mobile'        => '9999999999',
        ]);

    }

    public function test_admin_can_delete_supplier()
    {
        //Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier = Supplier::factory()->create();

        //Act
         $response = $this->actingAs($user)
                     ->get(route('admin.supplier.delete' , $supplier->id));

        //Assert
        $response->assertRedirect(route('admin.supplier.index'));

        $this->assertSoftDeleted('suppliers', [
            'id' => $supplier->id,
        ]);
    }

  public function test_admin_can_view_supplier_trash()
    {
        // Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier = Supplier::factory()->create([
            'company_name' => 'ABC Supplier',
        ]);

        $supplier->delete();

        // Act
        $response = $this->actingAs($user)
            ->get(route('admin.supplier.trash'));


        // Assert
        $response->assertStatus(200);
        $response->assertViewIs('admin.supplier.trash');
    }

    public function test_admin_can_restore_deleted_supplier()
    {
        //Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier  = Supplier::factory()->create();

        $supplier->delete();

        //Act
        $response = $this->actingAs($user)
                    ->post(route('admin.supplier.restore' , $supplier->id));
        //Assert
        $response->assertRedirect(route('admin.supplier.index'));

        $response->assertSessionHas(
        'success',
        'Supplier restored successfully.'

        );

        $this->assertDatabaseHas('suppliers', [
            'id' => $supplier->id,
          'deleted_at' => null,
        ]);
    }

   public function test_cannot_restore_active_supplier()
    {
        // Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier = Supplier::factory()->create();


        // Act
        $response = $this->actingAs($user)
            ->post(route('admin.supplier.restore', $supplier->id));


        // Assert
        $response->assertSessionHas(
            'error',
            'Supplier is already active.'
        );
    }

    public function test_admin_can_force_delete_supplier()
    {
        // Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier = Supplier::factory()->create();

        $supplier->delete();


        // Act
        $response = $this->actingAs($user)
            ->delete(route('admin.supplier.forceDelete', $supplier->id));


        // Assert
        $response->assertRedirect(route('admin.supplier.trash'));

        $response->assertSessionHas(
            'success',
            'Supplier permanently deleted.'
        );

        $this->assertDatabaseMissing('suppliers', [
            'id' => $supplier->id,
        ]);
    }

    public function test_cannot_force_delete_active_supplier()
    {
        // Arrange
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $supplier = Supplier::factory()->create();


        // Act
        $response = $this->actingAs($user)
            ->delete(route('admin.supplier.forceDelete', $supplier->id));


        // Assert
        $response->assertSessionHas(
            'error',
            'Only deleted suppliers can be permanently deleted.'
        );
    }

}
