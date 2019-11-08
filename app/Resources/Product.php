<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class productList extends JsonResource
{

    public function toArray($request)
    {

        return [
            'product_code' => $this->product_code,
            'title' => $this->title,
            'no_product' => $this->no_product,
            'sn_product' => $this->sn_product,
            'photo_highlight' => $this->photo_highlight,
            'photo' => $this->photo,
            'description' => $this->description,
            'price_piece' => $this->price_piece,
            'price_box' => $this->price_box,
            'product_brand_id' => $this->product_brand_id,
            'product_brands_name' => $this->product_brands_name,

        ];
    }
}
