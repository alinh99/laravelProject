<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $table = 'products';
    public function product_type(){
   ///return $this->belongsTo('App\product_type','id','id');
        return $this->belongsTo('App\ProductType','id_type','id');
 }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
 }
}
