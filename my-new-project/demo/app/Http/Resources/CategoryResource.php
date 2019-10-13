<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\collections\CategorysModel;
class CategoryResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['key','id','icon','name','description','created_at','updated_at'];

    public static function collection($resource)
    {
        return tap(new CategorysCollection($resource), function($collection){
            $collection->collects = __CLASS__;
        });
    }


    public function toArray($request)
    {
        return $this->filterFields([
            'key' => $this->id,
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'icon' => $this->icon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ]);
    }
}
