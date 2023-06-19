<?php

namespace Database\Factories\Admin;

use App\Models\Kafala;
use Illuminate\Database\Eloquent\Factories\Factory;

class KafalaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kafala::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type_id' => $this->faker->word,
        'country_id' => $this->faker->word,
        'name_en' => $this->faker->word,
        'name_ar' => $this->faker->word,
        'monthly_amount' => $this->faker->randomDigitNotNull,
        'active' => $this->faker->word,
        'image' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
