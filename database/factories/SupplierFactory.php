<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{

    protected $model = Supplier::class;


    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'cin' => $this->faker->word,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->numberBetween(10000, 99999),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
