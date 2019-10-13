<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BillsCollections extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     protected $withoutFields = ['id','order','customer','created_at','updated_at'];

     public $collects;

     public function toArray($request)
     {
         return $this->collection->map(function($item, $key){
            return (new BillResource($item))->hide($this->withoutFields);
         })->all();
     }
}
