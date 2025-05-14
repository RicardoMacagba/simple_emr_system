<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female', 'other']);
        
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'),
            'gender' => $gender,
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'medical_history' => $this->faker->paragraphs(2, true),
            'allergies' => $this->faker->boolean(70) ? $this->faker->words(3, true) : null,
            'blood_type' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone' => $this->faker->phoneNumber(),
            'insurance_provider' => $this->faker->company(),
            'insurance_number' => $this->faker->numerify('INS#########'),
            'occupation' => $this->faker->jobTitle(),
            'marital_status' => $this->faker->randomElement(['single', 'married', 'divorced', 'widowed']),
            'height' => $this->faker->randomFloat(2, 150, 200), // in centimeters
            'weight' => $this->faker->randomFloat(2, 45, 120), // in kilograms
            'notes' => $this->faker->boolean(80) ? $this->faker->paragraph() : null,
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(1, 100),
            'medical_history' => $this->faker->sentence,
        ];
    }
}
