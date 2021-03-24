<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'birthday' => $this->faker->dateTimeBetween('1960-01-01', '2020-12-31') ->format('d/m/Y'),
            'cin' => $this->faker->word,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
        ];
    }
}
