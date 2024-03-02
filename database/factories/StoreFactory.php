<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word(2, true);
        return [
        'name'  => $name,
        'slug'  =>  Str::slug($name),
        'description'    =>    $this->faker->sentence(),
        'logo_img'    =>    $this->faker->image(),
        'cover_img'    =>    $this->faker->image(),
        
        ];
    }
}