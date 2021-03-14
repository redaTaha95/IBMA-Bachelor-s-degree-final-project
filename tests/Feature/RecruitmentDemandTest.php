<?php

namespace Tests\Feature;

use App\Models\RecruitmentDemand;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RecruitmentDemandTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_recruitment_demands () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->create();

        $response = $this->get('/recruitment_demands');

        $response->assertSee($recruitmentDemand->post_name);
    }

    /** @test */
    public function a_user_can_read_single_recruitment_demand () {

        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->create();

        $response = $this->get('/recruitment_demands/'.$recruitmentDemand->id);

        $response->assertSee($recruitmentDemand->post_name);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_recruitmentDemand () {
        //Given we have an authenticated user
        $this->actingAs(User::factory()->create());
        //And a Recruitment Demand object
        $recruitmentDemand = recruitmentDemand::factory()->make();
        //When user submits post request to create Recruitment Demand endpoint
        $this->post('/recruitment_demands',$recruitmentDemand->toArray());
        //It gets stored in the database
        $this->assertEquals(1,RecruitmentDemand::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_recruitmentDemand()
    {
        //Given we have a Recruitment Demand object
        $recruitmentDemand = RecruitmentDemand::factory()->make();
        //When unauthenticated user submits post request to create task endpoint
        // He should be redirected to login page
        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_recruitment_demand_requires_a_post_name(){

        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->make(['post_name' => null]);

        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertSessionHasErrors('post_name');
    }

    /** @test */
    public function a_recruitment_demand_requires_a_number_of_profiles(){

        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->make(['number_of_profiles' => null]);

        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertSessionHasErrors('number_of_profiles');
    }

    /** @test */
    public function a_recruitment_demand_requires_a_number_of_years_of_experience(){

        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->make(['number_of_years_of_experience' => null]);

        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertSessionHasErrors('number_of_years_of_experience');
    }

    /** @test */
    public function a_recruitment_demand_requires_a_date_of_demand(){

        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->make(['date_of_demand' => null]);

        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertSessionHasErrors('date_of_demand');
    }

    /** @test */
    public function a_recruitment_demand_requires_a_status_of_demand(){

        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->make(['status_of_demand' => null]);

        $this->post('/recruitment_demands',$recruitmentDemand->toArray())
            ->assertSessionHasErrors('status_of_demand');
    }

    /** @test */
    public function authenticated_user_can_update_the_recruitment_demand(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());
        //And a task which is created by the user
        $recruitmentDemand = RecruitmentDemand::factory()->create();
        $recruitmentDemand->post_name = "Updated Post Name";
        $recruitmentDemand->number_of_profiles = "Updated Number Of Profiles";
        $recruitmentDemand->number_of_years_of_experience = "Updated Number Of Years Of Experience";
        $recruitmentDemand->date_of_demand = "Updated Date Of Demand";
        $recruitmentDemand->status_of_demand = "Updated Status Of Demand";
        //When the user hit's the endpoint to update the Recruitment Demand
        $this->put('/recruitment_demands/'.$recruitmentDemand->id, $recruitmentDemand->toArray());
        //The task should be updated in the database.
        $this->assertDatabaseHas('recruitment_demands',
            ['id'=> $recruitmentDemand->id,
                'post_name' => 'Updated Post Name',
                'number_of_profiles' => 'Updated Number Of Profiles',
                'number_of_years_of_experience' => 'Updated Number Of Years Of Experience',
                'date_of_demand' => 'Updated Date Of Demand',
                'status_of_demand' => 'Updated Status Of Demand'
            ]);

    }
    /** @test */
    public function unauthenticated_user_cannot_update_the_recruitmentDemand(){

        $recruitmentDemand = RecruitmentDemand::factory()->create();
        $recruitmentDemand->post_name = "Updated Post Name";
        $recruitmentDemand->number_of_profiles = "Updated Number Of Profiles";
        $recruitmentDemand->number_of_years_of_experience = "Updated Number Of Years Of Experience";
        $recruitmentDemand->date_of_demand = "Updated Date Of Demand";
        $recruitmentDemand->status_of_demand = "Updated Status Of Demand";
        //When the user hit's the endpoint to update the task
        $response = $this->put('/recruitment_demands/'.$recruitmentDemand->id, $recruitmentDemand->toArray());
        //We should expect a 403 error
        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_delete_the_recruitmentDemand(){

        //Given we have a signed in user
        $this->actingAs(User::factory()->create());

        $recruitmentDemand = RecruitmentDemand::factory()->create();

        $this->delete('/recruitment_demands/'.$recruitmentDemand->id);
        //The Recruitment Demand should be deleted from the database.
        $this->assertSoftDeleted('recruitment_demands',['id'=> $recruitmentDemand->id]);

    }

    /** @test */
    public function unauthenticated_user_cannot_delete_the_recruitmentDemand(){

        $recruitmentDemand = RecruitmentDemand::factory()->create();

        $response = $this->delete('/recruitment_demands/'.$recruitmentDemand->id);

        $response->assertRedirect('login');
    }
}
