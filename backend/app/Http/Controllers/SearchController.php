<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
       
        $products=[];
        if($request['submit'])
        {
            $validated = $request->validate(
                [
                    'name'=>"required",
                ]
            );
            $name = $request->name;
            $products = Product::WHERE('title','like',"%".$name."%")->get();
        }
        return view("component/search/index",['products'=>$products]);
    }
}
