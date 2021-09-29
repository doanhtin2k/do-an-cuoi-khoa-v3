@extends('layouts/main')
@section('title')
    <title>Order detail</title>
@endsection
@section('content')
    
<h1>Chi tiết đơn hàng</h1>

<table class="table table-bordered">
    
    <tr>
        <th>ID</th>
        <th>Order_id</th>
        <th>Tên sản phẩm</th>
        <th>giá</th>
        <th>số lượng</th>
    </tr>
    @foreach ($order_details as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->order_id}}</td>
        <td>{{$item->product_name}}</td>
        <td>{{number_format($item->product_price)}} đồng</td>
        <td>{{$item->quantity}}</td>
    </tr>
    @endforeach
</table>
<a class="btn btn-primary" href="{{route('order.index')}}">Back</a>
@endsection