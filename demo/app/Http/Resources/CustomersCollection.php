<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomersCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     public $collects;

     protected $withoutFields = ['id','name','address','phone','created_at','updated_at'];

     public function toArray($request)
     {
         return $this->collection->map(function($item, $key){
            return (new CustomerResource($item))->hide($this->withoutFields);
         })->all();
     }
}
