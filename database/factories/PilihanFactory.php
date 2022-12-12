<?php

namespace Database\Factories;

use App\Models\Pilihan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PilihanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pilihan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_soal' => $this->faker->word,
        'pilihan' => $this->faker->word,
        'benar' => $this->faker->word,
        'nilai' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
