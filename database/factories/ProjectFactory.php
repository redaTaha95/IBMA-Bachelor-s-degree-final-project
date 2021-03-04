<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->image(),
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'startDate' => $this->faker->date(),
            'dueDate' => $this->faker->date(),
            'budget' => $this->faker->randomFloat(),
            'teamMember' => $this->faker->text,
            //
        ];
    }
}
