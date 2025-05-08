<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'designation' => $this->faker->jobTitle,
            'branch' => $this->faker->company,
            'name' => $this->faker->name,
            'name_english' => $this->faker->name,
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'email' => $this->faker->safeEmail,
            'mobile' => $this->faker->phoneNumber,
            'dob' => $this->faker->date(),
            'rank_id' => null, // or use Rank::factory()->create()->id if needed
            'symbol_no' => $this->faker->randomNumber(6, true),
            'education' => $this->faker->sentence(3),
            'permanent_address_district' => $this->faker->state,
            'permanent_address' => $this->faker->address,
            'temporary_address_district' => $this->faker->state,
            'temporary_address' => $this->faker->address,
            'father_name' => $this->faker->name('male'),
            'mother_name' => $this->faker->name('female'),
            'spouse_name' => $this->faker->name,
            'child' => $this->faker->numberBetween(0, 5),
            'religion' => $this->faker->randomElement(['Hindu', 'Muslim', 'Christian', 'Buddhist']),
            'mother_tongue' => $this->faker->languageCode,
            'descriptions' => $this->faker->paragraph,
            'joining_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'status' => 1,
            'profile' => null, // Simulate file path if needed
            'slug' => $this->faker->unique()->slug,
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
