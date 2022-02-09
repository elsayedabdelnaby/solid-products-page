<?php

namespace Modules\Products\Http\Controllers\Actions\Categories;

use Modules\Products\Entities\Category;
use Modules\Products\Transformers\CategoryResource;

class GetAllCategoriesAction
{
    /**
     * return all categories
     */
    public function execute()
    {
        return CategoryResource::collection(Category::all());
    }
}
