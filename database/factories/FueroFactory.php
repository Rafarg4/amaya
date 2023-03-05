<?php

namespace Database\Factories;

use App\Models\Fuero;
use Illuminate\Database\Eloquent\Factories\Factory;

class FueroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fuero::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_fuero' => $this->faker->text,
        'descripcion_fuero' => $this->faker->text,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
