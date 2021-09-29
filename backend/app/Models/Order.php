<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded=[];
protected $table="orders";
public function order_detail()
    {
        return $this->hasMany('App\Models\Order_detail','order_id','id');
    }
}
