<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     protected $withoutFields = ['id','name','address','phone','created_at','updated_at'];

     public static function collection($resource)
     {
         return tap(new CustomersCollection($resource), function($collection){
             $collection->collects = __CLASS__;
         });
     }

     public function toArray($request)
     {
         return $this->filterFields([
             'id' => $this->id,
             'name' => $this->name,
             'address' => $this->address,
             'phone' => $this->phone,
             'updated_at' => $this->updated_at,
             'created_at' => $this->created_at
         ]);
     }
}
