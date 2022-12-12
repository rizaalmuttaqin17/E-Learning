<?php

namespace Database\Factories;

use App\Models\Soal;
use Illuminate\Database\Eloquent\Factories\Factory;

class SoalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Soal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_ujian' => $this->faker->word,
        'id_tipe_soal' => $this->faker->randomDigitNotNull,
        'pertanyaan' => $this->faker->text,
        'nilai' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
