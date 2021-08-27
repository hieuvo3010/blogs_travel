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
                    <form autocomplete="off"  method="POST" action="{{route('post.update',[$post->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                          <label>Tiêu đề bài viết:</label>
                          <input type="text" class="form-control"  name="title" placeholder="Enter title" value="{{$post->title}}">
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh:</label>
                            <input type="file" class="form-control" name="image">
                            <p><img src="{{asset('uploads/'.$post->image)}}" width="250px"></p>
                        </div>

                        <div class="form-group">
                            <label>Tóm tắt bài viết:</label>
                            <textarea  class="form-control"  name="summary"  id='ckeditor_summary' placeholder="Enter summary">{{$post->summary}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Nội dung bài viết:</label>
                            <textarea  class="form-control" name="content" placeholder="Enter content" id='ckeditor_content' cols="30" rows="10">{{$post->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="id_category">
                            @foreach($categories as $category)
                              <option {{$post->id_category == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                            </select>
                            
                          </div>

                        <div class="form-group">
                            <label>Example status select</label>
                            <select class="form-control" id="status" name="status">
                                @if($post->status == 1)
                              <option selected value="1">Kích hoạt</option>
                              <option value="0">Không kích hoạt</option>
                              @else
                              <option value="1">Kích hoạt</option>
                              <option selected value="0">Không kích hoạt</option>
                              @endif
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
