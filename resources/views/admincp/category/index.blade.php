@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê danh mục bài viết</div>
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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category => $value)
                                <tr>
                                    <th scope="row">{{$category + 1}}</th>
                                    <td>{{$value->title}}</td>
                                    <td>
                                        @if($value->status == 1)
                                        <p class="text text-success">Kích hoạt</p>
                                        @else
                                        <p class="text text-danger">Không kích hoạt</p>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary" href="{{route('category.show',[$value->id])}}">Edit</a> | <a class="btn btn-danger" href="{{route('category.delete',[$value->id])}}">Delete</a></td>
                                    
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
