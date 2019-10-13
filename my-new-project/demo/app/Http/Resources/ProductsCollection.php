<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['key','id','name','description','price','category','vendor','sale','import_price','media','viewer','inventory','created_at','updated_at'];

    public $collects;

    public function toArray($request)
    {
        return $this->collection->map(function($item, $key){
           return (new ProductResource($item))->hide($this->withoutFields);
        })->all();
    }
}
