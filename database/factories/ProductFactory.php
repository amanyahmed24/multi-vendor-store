<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
        'image'    =>    $this->faker->image(),
        'price'    =>    $this->faker->randomFloat(1,1,999),
        'compare_price'    =>    $this->faker->randomFloat(1,1000,9999),
        'category_id'    =>    Category::inRandomOrder()->first()->id,
        'store_id'    =>    Store::inRandomOrder()->first()->id,
        'featured'    =>    rand(0,1),
        ];
    }
}