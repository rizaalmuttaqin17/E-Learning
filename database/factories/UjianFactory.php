<?php

namespace Database\Factories;

use App\Models\Ujian;
use Illuminate\Database\Eloquent\Factories\Factory;

class UjianFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ujian::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_mata_kuliah' => $this->faker->word,
        'tipe_ujian' => $this->faker->word,
        'sifat_ujian' => $this->faker->word,
        'tanggal_ujian' => $this->faker->word,
        'selesai' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
