<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'=> $this->name,

            'discount' => $this->discount,

            'total price' =>round( $this->price*(1-($this->discount/100)),2),

            // the +1 i added it because i have only one review
            'rating' =>$this->reviews->count() >0 ?
             round($this->reviews->sum('star')/($this->reviews->count()+1),2)
             : "no rating yet",

            'href' =>[
                'Link' =>route('products.show',$this->id),
            ]

        ];
    }
}
