<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use User;

class UsersCollection extends Collection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['id','name','email','phone','avata','cover','created_at','updated_at'];
    public $collects;
    public function toArray($request)
    {
        return $this->collection->map(function($item, $key){
           return (new UserResource($item))->hide($this->withoutFields);
        })->all();
    }
}
