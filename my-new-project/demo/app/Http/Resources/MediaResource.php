<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = [];

    public static function collection($resource)
    {
        return tap(new MeidaCollection($resource),function($collection){
            $collection->collects = __CLASS__;
        });
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'path' => $this->path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
