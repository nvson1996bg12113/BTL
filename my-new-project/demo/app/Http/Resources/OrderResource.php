<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\collections\OrdersModel;
use App\collections\OrdersDetailModel;
class OrderResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['id','detail','status','created_at','updated_at'];
     public static function collection($resource)
     {
         return tap(new OrdersCollection($resource), function($collection){
             $collection->collects = __CLASS__;
         });
     }
    public function toArray($request)
    {
        return $this->filterFields([
          'id' => $this->id,
          'status' => $this->status,
          'detail' => OrderDetailResource::collection(OrdersDetailModel::where('orders_id', $this->id)->get())->hide([]),
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
        ]);
        //return parent::toArray($request);
    }
}
