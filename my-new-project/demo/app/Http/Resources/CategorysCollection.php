<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategorysCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['key','id','icon','name','description','created_at','updated_at'];

    public $collects;

    public function toArray($request)
    {
        return $this->collection->map(function($item, $key){
           return (new CategoryResource($item))->hide($this->withoutFields);
        })->all();
    }
}
