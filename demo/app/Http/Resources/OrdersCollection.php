<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $collects;
    protected $withoutFields = ['id','detail','status','created_at','updated_at'];
    public function toArray($request)
    {
        return $this->collection->map(function($item, $key){
           return (new OrderResource($item))->hide($this->withoutFields);
        })->all();
    }
}
