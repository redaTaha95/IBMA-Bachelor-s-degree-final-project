<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_projects () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $response = $this->get('/projects');

        $response->assertSee($project->name);
    }

    /** @test */
    public function a_user_can_read_single_project () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $response = $this->get('/projects/'.$project->id);

        $response->assertSee($project->name);
           // ->assertSee($project->description);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_project () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Project object
        $project = Project::factory()->make();
        //When user submits post request to create project endpoint
        $this->post('/projects',$project->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Project::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_project()
    {
        //Given we have a project object
        $project = Project::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/projects',$project->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_project_requires_a_name(){

        $this->actingAs(User::factory()->create());

        $project = Project::factory()->make(['name' => null]);

        $this->post('/projects',$project->toArray())
            ->assertSessionHasErrors('name');
    }



    public function authenticated_user_can_update_the_project(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $project = Project::factory()->create();
        $project->name = "Updated Name";
        //When the user hit's the endpoint to update the project
        $this->put('/projects/'.$project->id, $project->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('projects',['id'=> $project->id , 'name' => 'Updated Name']);

    }

    /** @test */
    public function unauthenticated_user_cannot_update_the_project(){

        $project = Project::factory()->create();
        $project->name = "Updated Name";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/projects/'.$project->id, $project->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_project(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $this->delete('/projects/'.$project->id);
        //The project should be deleted from the database.
        $this->assertSoftDeleted('projects',['id'=> $project->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_project(){

        $project = Project::factory()->create();

        $response = $this->delete('/projects/'.$project->id);

        $response->assertRedirect('login');

    }
}
