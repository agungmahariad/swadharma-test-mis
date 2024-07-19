<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LOBModel;


class LOBModelFactory extends Factory
{
    protected $model = LOBModel::class;

    public function definition()
    {
        return [
            'lob' => fake()->randomElement(['KUR', 'PEN']),
            'claim_reason' => fake()->randomElement(['Macet', 'Meninggal']),
            'periode' => fake()->date(),
            'load_value' => fake()->randomFloat(2, 1000, 100000),
            'amount_of_customer' => fake()->numberBetween(1, 100),
            'sended' => 0,
        ];
    }
}
