<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get any existing user for assignment (we'll use the first user as the doctor)
        $doctor = User::first();

        // Create 50 fake patients
        for ($i = 0; $i < 50; $i++) {
            $gender = $faker->randomElement(['male', 'female', 'other']);
            $firstName = $faker->firstName($gender);
            $lastName = $faker->lastName;
            $dateOfBirth = $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d');

            Patient::create([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'date_of_birth' => $dateOfBirth,
                'gender' => $gender,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'medical_history' => $faker->paragraphs(2, true),
                'allergies' => $faker->boolean(30) ? $faker->words(3, true) : null,
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'emergency_contact_name' => $faker->name,
                'emergency_contact_phone' => $faker->phoneNumber,
                'insurance_provider' => $faker->company,
                'insurance_number' => $faker->uuid,
                'occupation' => $faker->jobTitle,
                'marital_status' => $faker->randomElement(['single', 'married', 'divorced', 'widowed']),
                'height' => $faker->numberBetween(150, 200),
                'weight' => $faker->numberBetween(45, 120),
                'notes' => $faker->boolean(70) ? $faker->paragraph : null,
                'assigned_doctor_id' => $doctor ? $doctor->id : null,
                'user_id' => $doctor ? $doctor->id : null,
            ]);
        }
    }
}
