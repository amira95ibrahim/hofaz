<?php

namespace Database\Factories\Admin;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_en' => $this->faker->word,
        'title_ar' => $this->faker->word,
        'details_en' => $this->faker->text,
        'details_ar' => $this->faker->text,
        'image' => $this->faker->word,
        'slug_en' => $this->faker->text,
        'slug_ar' => $this->faker->text,
        'active' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
