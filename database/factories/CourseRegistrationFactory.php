<?php

namespace Database\Factories;

use App\Models\CourseRegistration;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseRegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseRegistration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'age' => $this->faker->numberBetween(20, 60),
            'phone' => $this->faker->e164PhoneNumber,
        ];
    }
}
