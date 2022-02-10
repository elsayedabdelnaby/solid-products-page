<?php

namespace Modules\Products\Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\ProductTranslation;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(200)->create()->each(
            function ($product) {
                ProductTranslation::factory([
                    'product_id' => $product->id,
                    'language_id' => Language::where('code', config('app.default_locale'))->select('id')->first()->id
                ])->create();
                ProductTranslation::factory([
                    'product_id' => $product->id,
                    'language_id' => Language::where('code', 'ar')->select('id')->first()->id
                ])->create();
            }
        );
    }
}
