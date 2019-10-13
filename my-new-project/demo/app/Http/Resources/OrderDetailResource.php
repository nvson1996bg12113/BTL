<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\collections\ProductsModel;
class OrderDetailResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['index','product','number','price_total','created_at','updated_at'];
    public static function collection($resource)
     {
         return tap(new OrderDetailsCollection($resource), function($collection){
             $collection->collects = __CLASS__;
         });
     }
    public function toArray($request)
    {
      $product = ProductsModel::find($this->products_id);
      $total_price = (float)$product->price * $this->number;
       return $this->filterFields([
          'index' => $this->orders_id,
          'product' => (new ProductResource($product))->hide([]),
          'number' => $this->number,
          'price_total' => $total_price,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
        ]);
        //return parent::toArray($request);
    }
}
