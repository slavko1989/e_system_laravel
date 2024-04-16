<?php

namespace Database\Factories;
use App\Models\Product;
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

     protected $model = Product::class;
    public function definition()

    {

        $price = $this->faker->randomElement([80,100,150,200,135,89,160]);
        $new_price = $this->faker->boolean(30) ? $this->faker->randomFloat(2,5,90) : null;

        return [

            'title'=>$this->faker->sentence,
            'text'=>$this->faker->paragraph,
            'price'=>$price,
            'new_price'=>$new_price,
            'image'=>$this->faker->imageUrl,
            'cat_id'=>$this->faker->numberBetween(2,12),
            'brand_id'=>$this->faker->numberBetween(1,12),
            'gender_id'=>$this->faker->numberBetween(1,3),
            'quantity'=>$this->faker->numberBetween(1,20)

        ];
    }
}
