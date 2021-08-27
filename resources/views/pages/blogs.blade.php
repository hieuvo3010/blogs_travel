@extends('layout')
@section('content')
@foreach ($posts as $post)
@endforeach
<div class="container">
    <h3 class="title">{{ $post->category->title }}</h3>
    @foreach ($posts as $post => $value) 
    <div class="row container-article">
        <div class="col-md-3 col-md-3 col-sm-12 col-xs-12">
            <img src="{{asset('uploads/'.$value->image)}}" width="250px">
        </div>
        <div class="col-md-9 col-md-9 col-sm-12 col-xs-12">
            <div class="box-article">
                <h5 class="article-title">{{ $value->title }}</h5>
                <div class="article-summary">{{$value->summary}}</div>
                <a href="{{route('showArticle',[$value->id])}}" class="btn btn-primary">Xem bài viết</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection