<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VendorResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected $withoutFields = ['id','name','description','created_at','updated_at'];

    public static function collection($resource)
    {
        return tap(new VendorsCollection($resource), function($collection){
            $collection->collects = __CLASS__;
        });
    }


    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ]);
    }
}
