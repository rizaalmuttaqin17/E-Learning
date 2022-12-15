<?php

namespace Database\Factories;

use App\Models\Jawaban;
use Illuminate\Database\Eloquent\Factories\Factory;

class JawabanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jawaban::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_pilihan' => $this->faker->word,
        'id_user' => $this->faker->word,
        'jawaban' => $this->faker->word,
        'nilai_jwb' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
