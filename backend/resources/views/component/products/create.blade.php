@extends('layouts/main')
@section('title')
    <title>Thêm mới Product</title>
@endsection
@section('content')
<h2>Thêm mới sản phẩm</h2>
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="category_id">Chọn danh mục</label>
        <select name="category_id" class="form-control" id="category_id" >
            @foreach ($cate as $key => $item)
                <option value="{{$item->id}}"
                    >{{$item->name}}</option>
            @endforeach
        </select>
        @error('category_id')
                    <span class="invalid-feedback" role="alert" style="color:red">
                        <strong>{{ $message }}</strong>
                    </span>
         @enderror
    </div>
    <div class="form-group">
        <label for="title">Nhập tên sản phẩm</label>
        <input type="text" name="title" value=""
               class="form-control" id="title"/>
            @error('title')
               <span class="invalid-feedback" role="alert" style="color:red">
                   <strong>{{ $message }}</strong>
               </span>
            @enderror
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
        @error('avatar')
            <span class="invalid-feedback" role="alert" style="color:red">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <img src="#" id="img-preview" style="display: none" width="100" height="100"/>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" value=""
               class="form-control" id="price"/>

               @error('price')
               <span class="invalid-feedback" role="alert" style="color:red">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
    </div>
    <div class="form-group">
        <label for="amount">Số lượng</label>
        <input type="number" name="amount" value=""
               class="form-control" id="amount"/>
               @error('amount')
               <span class="invalid-feedback" role="alert" style="color:red">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
    </div>
    <div class="form-group">
        <label for="summary">Size(Note:các size cách nhau dấy ,)</label>
        <input type="text" name="size" class="form-control" />
                  @error('size')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>
    <div class="form-group">
        <label for="promotions">Promotions(Khuyến mãi:giảm giá x%)</label>
        <input type="number" name="promotions" class="form-control" />
                  @error('promotions')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>
    <div class="form-group">
        <label for="Designs">Designs</label>
        <input type="text" name="Designs" class="form-control" />
                  @error('Designs')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>
    <div class="form-group">
        <label for="sex">Giới tính</label>
        <textarea name="sex" id="sex"
                  class="form-control"></textarea>
                  @error('sex')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn sản phẩm</label>
        <textarea name="summary" id="summary"
                  class="form-control"></textarea>
                  @error('summary')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>
    <div class="form-group">
        <label for="content">Mô tả chi tiết sản phẩm</label>
        <textarea name="content" id="content"
                  class="form-control"></textarea>
                  @error('content')
                  <span class="invalid-feedback" role="alert" style="color:red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
    </div>

    <div class="form-group">
        <label for="seo-title">Seo title</label>
        <input type="text" name="seo_title" value=""
               class="form-control" id="seo-title"/>
    </div>
    <div class="form-group">
        <label for="seo-description">Seo description</label>
        <input type="text" name="seo_description" value=""
               class="form-control" id="seo-description"/>
    </div>

    <div class="form-group">
        <label for="seo-keywords">Seo keywords</label>
        <input type="text" name="seo_keywords" value=""
               class="form-control" id="seo-keywords"/>
    </div>

    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <option value=0>Inactive</option>
            <option value=1>Active</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="{{route('product.index')}}" class="btn btn-default">Back</a>
    </div>
</form>
@endsection
@section('js')
    <script>
            CKEDITOR.replace( 'content');
    </script>
@endsection