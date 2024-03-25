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
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'date_naissance' => $this->faker->date(),
            // 'ville_id' => Ville::factory()->create()->id
            //学生的城市与已经存在的城市不一定有关
            'ville_id' => Ville::all()->random()->id 
            //所有学生的城市都是城市表格中存在的城市
        ];
    }
}
