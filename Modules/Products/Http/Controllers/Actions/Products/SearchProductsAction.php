<?php

namespace Modules\Products\Http\Controllers\Actions\Products;

use Illuminate\Http\Request;
use Modules\Products\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Products\Transformers\CategoryResource;
use Modules\Products\Transformers\ProductResource;

class SearchProductsAction
{
    /**
     * return all categories
     */
    public function execute($categories_ids = null)
    {
        $products = new Product();

        if($categories_ids){
            $products = $products->whereIn('cat_id', $categories_ids);
        }
        $products = $products->get();
        return ProductResource::collection($products);
    }
}
