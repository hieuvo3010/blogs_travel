@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê bài viết</div>
                @if(Session::has('message'))
                     <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên bài viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post => $value)
                                <tr>
                                    <th scope="row">{{$post + 1}}</th>
                                    <td>{{$value->title}}</td>
                                    <td ><img src="{{asset('uploads/'.$value->image)}}" width="250px"></td>
                                    <td>{{$value->category->title}}</td>
                                    <td>{{$value->summary}}</td>
                                    <td>
                                        @if($value->status == 1)
                                        <p class="text text-success">Kích hoạt</p>
                                        @else
                                        <p class="text text-danger">Không kích hoạt</p>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('post.show',[$value->id])}}">Edit</a> | <a class="btn btn-danger" href="{{route('post.delete',[$value->id])}}">Delete</a></td>
                                </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
