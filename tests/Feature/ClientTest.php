<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_clients () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $client = Client::factory()->create();

        $response = $this->get('/clients');

        $response->assertSee($client->name);
    }

    /** @test */
    public function a_user_can_read_single_client () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $client = Client::factory()->create();

        $response = $this->get('/clients/'.$client->id);

        $response->assertSee($client->name)
            ->assertSee($client->email);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_client () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Client object
        $client = Client::factory()->make();
        //When user submits post request to create client endpoint
        $this->post('/clients',$client->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Client::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_client()
    {
        //Given we have a client object
        $client = Client::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/clients',$client->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_client_requires_a_name(){

        $this->actingAs(User::factory()->create());

        $client = Client::factory()->make(['name' => null]);

        $this->post('/clients',$client->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_client_requires_an_email(){

        $this->actingAs(User::factory()->create());

        $client = Client::factory()->make(['email' => null]);

        $this->post('/clients',$client->toArray())
            ->assertSessionHasErrors('email');
    }

    /** @test */
    public function authenticated_user_can_update_the_client(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $client = Client::factory()->create();
        $client->name = "Updated Name";
        //When the user hit's the endpoint to update the client
        $this->put('/clients/'.$client->id, $client->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('clients',['id'=> $client->id , 'name' => 'Updated Name']);

    }
    /** @test */
    public function unauthenticated_user_cannot_update_the_client(){

        $client = Client::factory()->create();
        $client->name = "Updated Name";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/clients/'.$client->id, $client->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_client(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $client = Client::factory()->create();

        $this->delete('/clients/'.$client->id);
        //The client should be deleted from the database.
        $this->assertSoftDeleted('clients',['id'=> $client->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_client(){

        $client = Client::factory()->create();

        $response = $this->delete('/clients/'.$client->id);

        $response->assertRedirect('login');

    }
}
