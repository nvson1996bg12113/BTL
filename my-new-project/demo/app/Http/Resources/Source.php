<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Source extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function hide(array $fields)
    {
        $this->withoutFields = $fields;
        return $this;
    }

    public function show(array $fields)
    {
        $array = array_diff($this->withoutFields, $fields);
        $str = implode(',', $array);
        $this->withoutFields = explode(',', $str);
        return $this;
    }
    
    public function filterFields($array)
    {
        return collect($array)->forget($this->withoutFields)->toArray();
    }
}
