<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Contact::class;

    public function definition()
    {
        return [
            'cle' => $this->faker->unique()->word,
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'e_mail' => $this->faker->unique()->safeEmail,
            'telephone_fixe' => $this->faker->phoneNumber,
            'service' => $this->faker->jobTitle,
            'fonction' => $this->faker->randomElement(['Manager', 'Supervisor', 'Coordinator']),
            'company_id' => \App\Models\Company::factory()->create()->id,
        ];
    }
}
