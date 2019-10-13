<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
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
    
    public function get($request)
    {
        return $request;
    }

    public function getWithoutFileds()
    {
        return $this->withoutFields;
    }
}
