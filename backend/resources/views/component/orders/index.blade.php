@extends('layouts/main')
@section('title')
    <title>Order</title>
@endsection
@section('content')
    <h1>Danh sách Order</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>user</th>
                <th>fullname</th>
                <th>address</th>
                <th>mobile</th>
                <th>email</th>
                <th>note</th>
                <th>price total</th>
                <th>payment status</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($orders as $key => $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->user_id}}</td>
                    <td>
                        {{$value->fullname}}
                    </td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->mobile}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->note}}</td>
                    <td>{{number_format($value->price_total)}} đồng</td>
                    <td>
                        @if ($value->payment_status==0)
                            Chưa thanh toán
                        @endif
                        @if ($value->payment_status==1)
                            Đã thanh toán
                        @endif
                    </td>
                    <td>{{date('d-m-Y H:i:s', strtotime($value->created_at))}}</td>
                    <td>
                        <a href="{{route('order.show',[$value->id])}}"
                            title="Chi tiết">
                             <i class="fa fa-eye"></i>
                         </a>
                    </td>
                </tr>
                 @endforeach
        </tbody>
    </table>
    <div style="margin:10px 0;text-align:center">
        {{$orders->links()}}
    </div>
@endsection



