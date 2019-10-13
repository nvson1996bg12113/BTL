<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\collections\ProductsModel;

class ProductResource extends Source
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected $withoutFields = ['key','id','name','description','price','category','vendor','sale','import_price','media','viewer','inventory','created_at','updated_at'];

    public static function collection($resource)
    {
        return tap(new ProductsCollection($resource), function($collection){
            $collection->collects = __CLASS__;
        });
    }

    public function toArray($request)
    {
        return $this->filterFields([
            'key' => $this->id,
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'import_price' => $this->import_price,
            'description' => $this->description,
            'category' => (new CategoryResource(ProductsModel::find($this->id)->category()->first()))->hide(['description','created_at','updated_at']),
            'vendor' => (new VendorResource(ProductsModel::find($this->id)->vendor()->first()))->hide(['description','created_at','updated_at']),
            'sale' => $this->sale,
            'media' => MediaResource::collection(ProductsModel::find($this->id)->media()->get())->hide([]),
            'viewer' => $this->viewer,
            'inventory' => $this->inventory,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ]);
    }
}
