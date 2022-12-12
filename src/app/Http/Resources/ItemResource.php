<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'item_id' => $this->id,
            'category_name' => $this->category->title,
            'category_description' => $this->category->description,
            'subCategory' => ($this->subCategory) ? $this->subCategory->title : null,
            'subCategory_description' => ($this->subCategory) ? $this->subCategory->description : null,
            'item_name' => $this->name,
            'item_description' => $this->description,
            'item_price' => $this->price,
            'image_string' => $this->image_string,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
