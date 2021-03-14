<?php

namespace Database\Factories;

use App\Models\RecruitmentDemand;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitmentDemandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RecruitmentDemand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_name' => $this->faker->name,
            'number_of_profiles' => $this->faker->numberBetween(1, 10),
            'number_of_years_of_experience' => $this->faker->numberBetween(1, 10),
            'date_of_demand' => $this->faker->dateTimeBetween('2021-01-01', '2050-12-31') ->format('d/m/Y'),
            'status_of_demand' => $this->faker->text,
        ];
    }
}
