@extends('layouts/main')
@section('title')
    <title> detail category</title>
@endsection
@section('content')
    
{{-- @dd($cate->name) --}}
<h1>Chi tiết category</h1>

<table class="table table-bordered">
    
    <tr>
        <th>ID</th>
        <td>{{$cate->id}}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{$cate->name}}</td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td>
           <img src="{{asset('uploads/'.$cate->avatar)}}" style="width: 160px" />
        </td>
    </tr>
    <tr>
        <th>Description</th>
        <td>{{$cate->description}}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>
           @if($cate->status==0)
               Active 
           @else
            Inactive
           @endif
        </td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td>
            {{$cate->created_at}}
        </td>
    </tr>
    <tr>
        <th>Updated_at</th>
        <td>
            {{$cate->updated_at}}
        </td>
    </tr>
</table>
<a class="btn btn-primary" href="{{route('category.index')}}">Back</a>
@endsection