<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    protected $guarded=[];
protected $table="order_details";
public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id','id');
    }
}
