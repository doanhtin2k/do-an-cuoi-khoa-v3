
@extends('layouts/main')
@section('title')
    <title> new category</title>
@endsection
@section('content')
    <h2>Thêm mới danh mục</h2>
    <form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên danh mục</label>
                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert" style="color:red">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        </div>

        <div class="form-group">
            <label>Ảnh đại diện</label>

            <div>
                <input id="category-avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}"autofocus>

                @error('avatar')
                    <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
                    <div>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description"  autofocus>
                            {{ old('description') }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert" style="color:red">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        </div>

        <div class="form-group">
            <label>Trạng thái</label>

            <div>
                <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" autofocus>
                    <option value="0" >Active</option>
                    <option value="1" >Disabled</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <input type="submit" class="btn btn-primary" name="submit" value="Save"/>
        <input type="reset" class="btn btn-secondary" name="submit" value="Reset"/>
    </form>
@endsection
@section('js')
    <script>
            CKEDITOR.replace( 'description');
    </script>
@endsection
