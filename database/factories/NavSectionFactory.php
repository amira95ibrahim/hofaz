<?php

namespace Database\Factories\Admin;

use App\Models\NavSection;
use Illuminate\Database\Eloquent\Factories\Factory;

class NavSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NavSection::class;

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
