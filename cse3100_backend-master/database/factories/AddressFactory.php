<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'district'=>$this->faker->unique()->name(),
            'sub_district'=>$this->faker->unique()->name(),
            'division'=>$this->faker->unique()->name(),
            'student_id'=>1,
        ];
    }
}
