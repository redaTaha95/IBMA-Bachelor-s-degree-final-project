<?php

namespace Tests\Feature;

use App\Models\Supplier;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SupplierTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_suppliers () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->create();

        $response = $this->get('/suppliers');

        $response->assertSee($supplier->full_name);
    }

    /** @test */
    public function a_user_can_read_single_supplier () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->create();

        $response = $this->get('/suppliers/'.$supplier->id);

        $response->assertSee($supplier->full_name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_supplier () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Supplier object
        $supplier = Supplier::factory()->make();
        //When user submits post request to create supplier endpoint
        $this->post('/suppliers',$supplier->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Supplier::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_supplier ()
    {
        //Given we have a supplier object
        $supplier = Supplier::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/suppliers',$supplier->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_supplier_requires_a_full_name(){

        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make(['full_name' => null]);

        $this->post('/suppliers',$supplier->toArray())
            ->assertSessionHasErrors('full_name');
    }

    /** @test */
    public function a_supplier_requires_a_cin(){

        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make(['cin' => null]);

        $this->post('/suppliers',$supplier->toArray())
            ->assertSessionHasErrors('cin');
    }

    /** @test */
    public function a_supplier_requires_an_address(){

        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make(['address' => null]);

        $this->post('/suppliers',$supplier->toArray())
            ->assertSessionHasErrors('address');
    }

    /** @test */
    public function a_supplier_requires_a_phone(){

        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make(['phone' => null]);

        $this->post('/suppliers',$supplier->toArray())
            ->assertSessionHasErrors('phone');
    }

    /** @test */
    public function a_supplier_requires_an_email(){

        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->make(['email' => null]);

        $this->post('/suppliers',$supplier->toArray())
            ->assertSessionHasErrors('email');
    }

    /** @test */
    public function authenticated_user_can_update_the_supplier(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $supplier = Supplier::factory()->create();
        $supplier->full_name = "Updated Full Name";
        $supplier->cin = "Updated Cin";
        $supplier->address = "Updated Address";
        $supplier->phone = "Updated Phone";
        $supplier->email = "Updated Email";
        //When the user hit's the endpoint to update the supplier
        $this->put('/suppliers/'.$supplier->id, $supplier->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('suppliers',
            ['id'=> $supplier->id,
                'last_name' => 'Updated Full Name',
                'cin' => 'Updated Cin',
                'address' => 'Updated Address',
                'phone' => 'Updated Phone',
                'email' => 'Updated Email'
            ]);

    }
    /** @test */
    public function unauthenticated_user_cannot_update_the_supplier(){

        $supplier = Supplier::factory()->create();
        $supplier->full_name = "Updated Full Name";
        $supplier->cin = "Updated Cin";
        $supplier->address = "Updated Address";
        $supplier->phone = "Updated Phone";
        $supplier->email = "Updated Email";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/suppliers/'.$supplier->id, $supplier->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_supplier(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $supplier = Supplier::factory()->create();

        $this->delete('/suppliers/'.$supplier->id);
        //The supplier should be deleted from the database.
        $this->assertSoftDeleted('suppliers',['id'=> $supplier->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_supplier(){

        $supplier = Supplier::factory()->create();

        $response = $this->delete('/suppliers/'.$supplier->id);

        $response->assertRedirect('login');
    }
}
