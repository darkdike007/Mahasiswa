<?php

namespace Database\Factories;

use App\Models\mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    private static $nim = 10001;
    protected $model = mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => self::$nim++,
            'nama' => $this->faker->name(),
        ];
    }
}
