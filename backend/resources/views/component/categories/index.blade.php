@extends('layouts/main')
@section('title')
    <title>category</title>
@endsection
@section('content')
    <h1>Danh sách category</h1>
    <a href="{{route('category.create')}}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

                @foreach ($cate as $key => $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                        <img src="{{asset('uploads/'.$value->avatar)}}" width="60"/>
                    </td>
                    <td>{{$value->description}}</td>
                    <td>{{$value->status}}</td>
                    <td>{{date('d-m-Y H:i:s', strtotime($value->created_at))}}</td>
                    <td>{{date('d-m-Y H:i:s', strtotime($value->updated_at))}}</td>
                    <td>
                        <a href="{{route('category.show',[$value->id])}}"
                            title="Chi tiết">
                             <i class="fa fa-eye"></i>
                         </a>
                         <a href="{{route('category.edit',[$value->id])}}" title="Sửa">
                             <i class="fa fa-pencil-alt"></i>
                         </a>
                         <form action="{{route('category.destroy',[$value->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('ban chac chan muon xoa')">
                                    Delete
                            </button>
                        </form>
                    </td>
                </tr>
                 @endforeach
        </tbody>
    </table>
@endsection



