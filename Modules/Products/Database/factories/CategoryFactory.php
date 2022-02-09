<?php
namespace Modules\Products\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Products\Entities\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}

