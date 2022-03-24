<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($this->faker);

        return [
            'name' => $this->faker->productName,
            'size' => Arr::random(['xl', 'l', 'xs', 'm', 's']),
            'description' => $this->faker->text(50),
            'reference' => $this->faker->randomFloat(null, 11111111111,99999999999),
            'price' => $this->faker->randomFloat(null, 150, 350),
            'reviews' => $this->faker->numberBetween(5000 , 100000),
            'quantity' => $this->faker->randomFloat(null, 10, 250),
            'sex' => Arr::random([ 'm', 'f']),
            'rate' => $this->faker->randomFloat(null, 0,5),
            'category_id' => Arr::random([1, 2, 3, 4, 5 , 6, 7, 8,  9, 10]),
            'brand_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8,  9, 10]),


        ];
    }
}
