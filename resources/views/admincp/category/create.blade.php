@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục bài viết</div>

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
                    <form autocomplete="off"  method="post" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                          <label>Thể loại danh mục:</label>
                          <input type="text" class="form-control" name="title" placeholder="Enter title">
                        </div>

                        <div class="form-group">
                            <label>Example status select</label>
                            <select class="form-control"name="status">
                              <option value="1">Kích hoạt</option>
                              <option value="0">Không kích hoạt</option>
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Thêm mục</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
