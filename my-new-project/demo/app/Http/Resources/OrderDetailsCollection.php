<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
class OrderDetailsCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects;
    protected $withoutFields = ['index','product','number','price_total','created_at','updated_at'];
    public function toArray($request)
    {
        return $this->collection->map(function($item, $key){
           return (new OrderDetailResource($item))->hide($this->withoutFields);
        })->all();
    }
}
