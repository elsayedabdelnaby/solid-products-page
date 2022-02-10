<?php

namespace Modules\Products\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'default_name' => $this->default_name,
            'category_id' => $this->cat_id,
            'category_name' => $this->category ? $this->category->name : null,
            'category' => $this->category ? new CategoryResource($this->category) : null,
            'price' => $this->price,
            'translations' => ProductTranslationResource::collection($this->translations),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
