<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
class HomeController extends Controller
{
    //
    public function index()
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        
        $orderAll = Order::all();
        $orders=[];
        $total=0;
        foreach($orderAll as $item)
        {
            if($date == date('d-m-Y', strtotime($item->created_at)))
            {
                $orders[]= $item;
                $total+= $item->price_total;
            }
        }
         return view("home",['date'=>$date,'orders'=> $orders,'total'=>$total]);
    }
}
