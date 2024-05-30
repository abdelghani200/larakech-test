<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Company::class;

    public function definition()
    {
        return [
            'cle' => $this->faker->unique()->word,
            'nom' => $this->faker->company,
            'adresse' => $this->faker->address,
            'code_postal' => $this->faker->postcode,
            'ville' => $this->faker->city,
            'statut' => $this->faker->randomElement(['Lead', 'Client', 'Prospect']),
        ];
    }
}
