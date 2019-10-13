<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['id','name','email','phone','avata','cover','created_at','updated_at'];
    public static function collection($resource)
    {
        return tap(new UsersCollection($resource), function($collection){
            $collection->collects = __CLASS__;
        });
    }
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avata' => $this->avata,
            'cover' => $this->cover,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ]);
    }
}
