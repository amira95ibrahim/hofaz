<?php

namespace Database\Factories\Admin;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'site_title_ar' => $this->faker->word,
        'site_title_en' => $this->faker->word,
        'logo' => $this->faker->word,
        'keywords_ar' => $this->faker->text,
        'keywords_en' => $this->faker->text,
        'facebook' => $this->faker->word,
        'whatsapp' => $this->faker->word,
        'googlePlus' => $this->faker->word,
        'instagram' => $this->faker->word,
        'adminFooter' => $this->faker->word,
        'frontWebsiteFooter_ar' => $this->faker->word,
        'frontWebsiteFooter_en' => $this->faker->word,
        'youtubeAddress' => $this->faker->word,
        'twitterAddress' => $this->faker->word,
        'location' => $this->faker->word,
        'phoneNumber' => $this->faker->word,
        'postalCode' => $this->faker->word,
        'address' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
