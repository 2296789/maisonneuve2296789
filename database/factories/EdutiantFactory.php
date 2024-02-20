<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Edutiant;
use App\Models\Ville;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Edutiant>
 */
class EdutiantFactory extends Factory
{
    protected $model = Edutiant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'nom' => fake()->name(),
            // 'adresse' => fake()->address(),
            // 'telephone' => fake()->phoneNumber(),
            // 'email' => fake()->email(),
            // 'date_naissance' => fake()->date()

            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'date_naissance' => $this->faker->date(),
            'ville_id' => Ville::factory()->create()->id
        ];
    }
}
