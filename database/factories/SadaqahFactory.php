<?php

namespace Database\Factories;

use App\Models\Sadaqah;
use Illuminate\Database\Eloquent\Factories\Factory;

class SadaqahFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sadaqah::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->word,
        'name_ar' => $this->faker->word,
        'active' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
