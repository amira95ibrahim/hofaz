<?php

namespace Database\Factories\Admin;

use App\Models\Relief;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReliefFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Relief::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => $this->faker->word,
        'name_en' => $this->faker->word,
        'name_ar' => $this->faker->word,
        'description_en' => $this->faker->word,
        'description_ar' => $this->faker->word,
        'keywords_en' => $this->faker->word,
        'keywords_ar' => $this->faker->word,
        'slug_en' => $this->faker->word,
        'slug_ar' => $this->faker->word,
        'cost' => $this->faker->randomDigitNotNull,
        'paid' => $this->faker->randomDigitNotNull,
        'initial_amount' => $this->faker->randomDigitNotNull,
        'show_remaining' => $this->faker->word,
        'active' => $this->faker->word,
        'image' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
