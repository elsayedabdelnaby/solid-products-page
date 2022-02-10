<?php

namespace Modules\Products\Http\Controllers\Actions\Products;

use Illuminate\Http\Request;
use Modules\Products\Entities\Product;
use Modules\Products\Entities\ProductTranslation;
use Modules\Products\Transformers\ProductResource;

class CreateProductAction
{
    /**
     * create a new product
     */
    public function execute(Request $request): ProductResource
    {
        $data =  $request->except(['translations']);
        // create a product
        $product = Product::create($data);
        // create the translation of the product
        foreach ($request->translations as $translation) {
            $product_translation = ProductTranslation::where([
                ['product_id', $product->id],
                ['language_id', $translation['language_id']],
            ])->first();
            if (!$product_translation) {
                $product->translations()->create($translation);
            }
        }

        return new ProductResource($product);
    }
}
