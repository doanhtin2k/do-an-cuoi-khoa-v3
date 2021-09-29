@extends('layouts/main')
@section('title')
    <title>Search</title>
@endsection
@section('content')
<h1>Tìm kiếm</h1>
<form action="{{route('search')}}" method="get">
    <div class="form-group">
        <label>Nhập tên sản phẩm</label>
        <input type="text" name="name" value=""
               class="form-control"/>
               @error('name')
               <span class="invalid-feedback" role="alert" style="color:red">
                   <strong>{{ $message }}</strong>
               </span>
    @enderror
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-success"/>
    </div>
</form>
<table class="table table-bordered">
    <tr>
        <th>STT</th>
        <th>Danh Muc</th>
        <th>Title</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Amount</th>
        <th>Promotions(%)</th>
        <th>Created_at</th>
        <th>Chi tiet</th>
    </tr>
    @foreach ($products as $key=> $product)

    <tr>
        <td>{{$key+1}}</td>
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
        </td>
    </tr>
 @endforeach
</table>
@endsection