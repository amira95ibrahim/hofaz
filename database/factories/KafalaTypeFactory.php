<?php

namespace Database\Factories\Admin;

use App\Models\KafalaType;
use Illuminate\Database\Eloquent\Factories\Factory;

class KafalaTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KafalaType::class;

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
        'description_en' => $this->faker->text,
        'description_ar' => $this->faker->text,
        'active' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
