<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    //
    protected $table = "products";
    protected $fillable = ['name','description','price','import_price','categorys_id','vendors_id','sale','viewer','inventory'];
    public function category()
    {
    	return $this->belongsTo('App\collections\CategorysModel','categorys_id','id');
    }

    public function vendor()
    {
    	return $this->belongsTo('App\collections\VendorsModel','vendors_id','id');
    }
    public function media()
    {
    	return $this->hasManyThrough('App\collections\MediaModel','App\collections\ProductsMediaModel','products_id','id','id','media_id');
    }
    public function productsMedia(){
        return $this->hasMany('App\collections\ProductsMediaModel','products_id','id');
    }
    public function findKey($key){
       $result = $this->where('name','like',"%".$key."%")->get();
       if(count($result) > 0)
        return $result;
       else{
         if(strpos(strtoupper($key),"SALE") >= 0){
            $array = explode(" ",$key);
            $maxSale = 0;
            $result;
            if(count($array) == 1){
              //return null;
              $result = $this->where('sale','>',$maxSale)->get();
            }
            else{
              foreach ($array as $key => $value) {
                if((int)$value > $maxSale){
                  $maxSale = (int)$value;
                }
              }
              $result = $this->where('sale',$maxSale)->get();
            }

            return $result;
         }

         $result = $this->where('description',"%".$key."%")->get();
         return null;
       };

       //->orWhere('price',(float)$key)->orWhere('import_price',(float)$key)->orWhere('sale',(int)$key)->get();
    }
}
