<?php

namespace Database\Factories;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{

    protected $model = Candidate::class;

    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'birthday' => $this->faker->dateTimeBetween('1960-01-01', '2000-12-31') ->format('d/m/Y'),
            'cin' => $this->faker->word,
            'email' => $this->faker->email,
            'phone' => $this->faker->bothify('0???-??????'),
            'address' => $this->faker->address,
            'city' => $this->faker->city,
        ];
    }
}
