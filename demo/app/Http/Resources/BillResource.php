<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\collections\BillsModel;
class BillResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
     protected $withoutFields = ['id','order','customer','created_at','updated_at'];
     public static function collection($resource)
     {
         return tap(new BillsCollection($resource), function($collection){
             $collection->collects = __CLASS__;
         });
     }
    public function toArray($request)
    {
      return $this->filterFields([
          'id' => $this->id,
          'order' => (new OrderResource(BillsModel::find($this->id)->order()->first()))->hide([]),
          'customer' => (new CustomerResource(BillsModel::find($this->id)->customer()->first()))->hide([]),
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
      ]);
    }
}
