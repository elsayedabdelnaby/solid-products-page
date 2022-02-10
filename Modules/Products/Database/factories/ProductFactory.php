<?php

namespace Modules\Products\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Products\Entities\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Products\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cat_id' => Category::all()->random()->id,
            'price' => $this->faker->numberBetween(1, 1000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
