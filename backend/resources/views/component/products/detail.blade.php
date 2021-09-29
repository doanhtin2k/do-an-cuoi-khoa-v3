@extends('layouts/main')
@section('title')
    <title>Details {{$product->title}}</title>
@endsection
@section('content')
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{$product->id}}</td>
    </tr>
    <tr>
        <th>Category name</th>
        <td>{{$product->category->name}}</td>
    </tr>
    <tr>
        <th>Title</th>
        <td>{{$product->title}}</td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
                <img height="80" src="{{asset('uploads/'.$product->avatar)}}"/>
        </td>
    </tr>
    <tr>
        <th>Price</th>
        <td>{{number_format($product['price'])}} đồng</td>
    </tr>
    <tr>
        <th>amount</th>
        <td>{{$product->amount}}</td>
    </tr>
    <tr>
        <th>promotions</th>
        <td>{{$product->promotions}}%</td>
    </tr>
    <tr>
        <th>Content</th>
        <td>{!! $product->content !!}</td>
    </tr>
    <tr>
        <th>Seo Title</th>
        <td>{{$product->seo_title}}</td>
    </tr>
    <tr>
        <th>Seo description</th>
        <td>{{$product->seo_description}}</td>
    </tr>
    <tr>
        <th>Seo keywords</th>
        <td>{{$product->seo_keywords}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
            @if ($product->status==0)
            
                Inactive
             
            @endif    
            @if ($product->status==1)
            
                Active
              
            @endif    
        </td>
    </tr>
    <tr>
        <th>Created at</th>
        <td>{{date('d-m-Y H:i:s', strtotime($product['created_at']))}}</td>

    </tr>
    <tr>
        <th>Updated at</th>
        <td>
            @if ($product['updated_at']!=null)
            {{date('d-m-Y H:i:s', strtotime($product['updated_at']))}}
            @endif
        </td>
    </tr>
</table>
<a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
@endsection
