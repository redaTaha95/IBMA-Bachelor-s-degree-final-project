<?php

namespace Tests\Feature;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CandidateTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_candidates () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->create();

        $response = $this->get('/candidates');

        $response->assertSee($candidate->last_name)
            ->assertSee($candidate->first_name);
    }

    /** @test */
    public function a_user_can_read_single_candidate () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->create();

        $response = $this->get('/candidates/'.$candidate->id);

        $response->assertSee($candidate->last_name)
            ->assertSee($candidate->first_name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_candidate () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Candidate object
        $candidate = Candidate::factory()->make();
        //When user submits post request to create candidate endpoint
        $this->post('/candidates',$candidate->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Candidate::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_candidate()
    {
        //Given we have a candidate object
        $candidate = Candidate::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/candidates',$candidate->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_candidate_requires_a_last_name(){

        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->make(['last_name' => null]);

        $this->post('/candidates',$candidate->toArray())
            ->assertSessionHasErrors('last_name');
    }

    /** @test */
    public function a_candidate_requires_a_first_name(){

        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->make(['first_name' => null]);

        $this->post('/candidates',$candidate->toArray())
            ->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function a_candidate_requires_a_cin(){

        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->make(['cin' => null]);

        $this->post('/candidates',$candidate->toArray())
            ->assertSessionHasErrors('cin');
    }

    /** @test */
    public function a_candidate_requires_a_phone(){

        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->make(['phone' => null]);

        $this->post('/candidates',$candidate->toArray())
            ->assertSessionHasErrors('phone');
    }

    /** @test */
    public function a_candidate_requires_an_email(){

        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->make(['email' => null]);

        $this->post('/candidates',$candidate->toArray())
            ->assertSessionHasErrors('email');
    }

    /** @test */
    public function authenticated_user_can_update_the_candidate(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $candidate = Candidate::factory()->create();
        $candidate->last_name = "Updated Last Name";
        $candidate->first_name = "Updated First Name";
        $candidate->cin = "Updated Cin";
        $candidate->phone = "Updated Phone";
        $candidate->email = "Updated Email";
        //When the user hit's the endpoint to update the candidate
        $this->put('/candidates/'.$candidate->id, $candidate->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('candidates',
            ['id'=> $candidate->id,
            'last_name' => 'Updated Last Name',
            'first_name' => 'Updated First Name',
            'cin' => 'Updated Cin',
            'phone' => 'Updated Phone',
            'email' => 'Updated Email'
]);

    }
    /** @test */
    public function unauthenticated_user_cannot_update_the_candidate(){

        $candidate = Candidate::factory()->create();
        $candidate->name = "Updated Name";
        $candidate->first_name = "Updated First Name";
        $candidate->cin = "Updated Cin";
        $candidate->phone = "Updated Phone";
        $candidate->email = "Updated Email";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/candidates/'.$candidate->id, $candidate->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_candidate(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $candidate = Candidate::factory()->create();

        $this->delete('/candidates/'.$candidate->id);
        //The candidate should be deleted from the database.
        $this->assertSoftDeleted('candidates',['id'=> $candidate->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_candidate(){

        $candidate = Candidate::factory()->create();

        $response = $this->delete('/candidates/'.$candidate->id);

        $response->assertRedirect('login');
    }
}
