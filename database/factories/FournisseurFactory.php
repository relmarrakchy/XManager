<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fournisseur>
 */
class FournisseurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->numerify('CEP####'),
            'famille' => $this->faker->randomElement(['Particulier', 'GrandCompte']),
            'status' => $this->faker->randomElement(['Actif', 'Inactif']),
            'raison_social' => $this->faker->word(),
            'if' => $this->faker->word(),
            'ice' => $this->faker->word(),
            'rc' => $this->faker->word(),
            'patente' => $this->faker->randomDigit(),
            'cin' => $this->faker->word(),
            'mode_paiement' => $this->faker->randomElement(['Cheque', 'Carte Bancaire','Espece']),
            'nom' => $this->faker->name(),
            'fonction' => $this->faker->word(),
            'email' => $this->faker->email(),
            'fix' => $this->faker->phoneNumber(),
            'fax' => $this->faker->phoneNumber(),
            'portable' => $this->faker->phoneNumber(),
            'adresse' => $this->faker->address(),
            'ville' => $this->faker->city(),
            'pays' => $this->faker->country(),
            'remise_1' => $this->faker->randomDigit(),
            'remise_2' => $this->faker->randomDigit(),
            'remise_3' => $this->faker->randomDigit(),
        ];
    }
}
