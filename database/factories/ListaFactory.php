<?php

namespace Database\Factories;

use App\Models\Lista;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListaFactory extends Factory
{
    protected $model = Lista::class;

    public function definition(): array
    {
        return [
            'lista_id' => $this->faker->numerify,
            'produto' => $this->faker->name,
            'unidade' => $this->faker->name,
            'quantidade' => $this->faker->numerify,
        ];
    }
}
