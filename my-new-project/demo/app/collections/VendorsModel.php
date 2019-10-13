<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class VendorsModel extends Model
{
    //
    protected $table = "vendors";
    protected $fillable = ['name','description'];
    public function products()
	{
		return $this->hasOne('App\collections\ProductsModel','vendors_id');
	}

	public function productsMedia()
	{
		return $this->hasManyThrough('App\collections\productsMediaModel','App\collections\ProductsModel','vendors_id','products_id');
	}

	public function categorys()
	{
		return $this->hasManyThrough('App\collections\CateogyrsModel','App\collections\ProductsModel','vendors_id','id','id','id');
	}
  public function findKey($key){
     $result = $this->Where('name','like',"%".$key."%")->get();
     if(count($result) > 0)
      return $result;
     else{
       return null;
     };

     //->orWhere('price',(float)$key)->orWhere('import_price',(float)$key)->orWhere('sale',(int)$key)->get();
  }
}
