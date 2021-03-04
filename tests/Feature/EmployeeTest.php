<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_employees () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->create();

        $response = $this->get('/employees');

        $response->assertSee($employee->name);
    }

    /** @test */
    public function a_user_can_read_single_employee () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->create();

        $response = $this->get('/employees/'.$employee->id);

        $response->assertSee($employee->name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_employee () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Client object
        $employee = Employee::factory()->make();
        //When user submits post request to create employee endpoint
        $this->post('/employees',$employee->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Employee::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_employee()
    {
        //Given we have a employee object
        $employee = Employee::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/employees',$employee->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_employee_requires_a_name(){

        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->make(['name' => null]);

        $this->post('/employees',$employee->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function an_employee_requires_an_email(){

        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->make(['email' => null]);

        $this->post('/employees',$employee->toArray())
            ->assertSessionHasErrors('email');
    }
    /** @test */
    public function an_employee_requires_a_phoneNumber(){

        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->make(['phone' => null]);

        $this->post('/employees',$employee->toArray())
            ->assertSessionHasErrors('phone');
    }
    /** @test */
    public function an_employee_requires_a_hireDate(){

        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->make(['hire_date' => null]);

        $this->post('/employees',$employee->toArray())
            ->assertSessionHasErrors('hire_date');
    }

    /** @test */
    public function authenticated_user_can_update_the_employee(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $employee = Employee::factory()->create();
        $employee->name = "Updated Name";
        //When the user hit's the endpoint to update the employee
        $this->put('/employees/'.$employee->id, $employee->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('employees',['id'=> $employee->id , 'name' => 'Updated Name']);

    }
    /** @test */
    public function unauthenticated_user_cannot_update_the_employee(){

        $employee = Employee::factory()->create();
        $employee->name = "Updated Name";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/employees/'.$employee->id, $employee->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_employee(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $employee = Employee::factory()->create();

        $this->delete('/employees/'.$employee->id);
        //The client should be deleted from the database.
        $this->assertSoftDeleted('employees',['id'=> $employee->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_employee(){

        $employee = Employee::factory()->create();

        $response = $this->delete('/employees/'.$employee->id);

        $response->assertRedirect('login');

    }
}
