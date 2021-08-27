@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm bài viết</div>

                <div class="card-body">
                    @if(Session::has('message'))
                     <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form autocomplete="off"  method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-group">
                          <label>Tiêu đề bài viết:</label>
                          <input type="text" class="form-control"  name="title" placeholder="Enter title" value="{{ old('title') }}">
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt bài viết:</label>
                            <textarea  class="form-control"  name="summary" id='ckeditor_summary'  placeholder="Enter summary" >{{{ old('summary') }}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Nội dung bài viết:</label>
                            <textarea  class="form-control" name="content" id='ckeditor_content' placeholder="Enter content" cols="30" rows="10">{{{ old('content') }}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="id_category">
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                            </select>
                            
                          </div>

                        <div class="form-group">
                            <label>Example status select</label>
                            <select class="form-control" id="status" name="status">
                              <option value="1">Kích hoạt</option>
                              <option value="0">Không kích hoạt</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
