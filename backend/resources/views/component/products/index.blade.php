@extends('layouts/main')
@section('title')
    <title>Product</title>
@endsection
@section('content')
<h2>Danh sách sản phẩm</h2>
<a href="{{route('product.create')}}" class="btn btn-success">
    <i class="fa fa-plus"></i> Thêm mới
</a>
<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Category name</th>
    <th>Title</th>
    <th>Avatar</th>
    <th>Price</th>
    <th>Amount</th>
    <th>Promotions(%)</th>
    <th>Created_at</th>
    <th>Action</th>
</tr>
    @foreach ($products as $product)

        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->title}}</td>
            <td>
                    <img height="80" src="{{asset('uploads/'.$product->avatar)}}"/>
            </td>
            <td>{{number_format($product->price)}}</td>
            <td> {{$product->amount}}</td>
            <td>
               {{$product->promotions}}
            </td>
            <td>{{date('d-m-Y H:i:s', strtotime($product->created_at))}} </td>

            <td>
                <a href="{{route('product.show',[$product->id])}}"
                    title="Chi tiết">
                     <i class="fa fa-eye"></i>
                 </a>
                 <a href="{{route('product.edit',[$product->id])}}" title="Sửa">
                     <i class="fa fa-pencil-alt"></i>
                 </a>
                 <form action="{{route('product.destroy',[$product->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('ban chac chan muon xoa')">
                            Delete
                    </button>
                </form>
            </td>
        </tr>
     @endforeach
</table>
<div style="margin:10px 0;text-align:center">
    {{$products->links()}}
</div>
@endsection


