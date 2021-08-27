@extends('../layout')
@section('content')
    <div class="container">
        <h3 class="title">Tin tức du lịch trong và ngoài nước</h3>

        @foreach ($posts as $post)
        <div class="row container-article">
            <div class="col-md-3 col-md-3 col-sm-12 col-xs-12">
                <img src="{{asset('uploads/'.$post->image)}}" width="250px">
            </div>
            <div class="col-md-9 col-md-9 col-sm-12 col-xs-12">
                <div class="box-article">
                    <h5 class="article-title">{{ $post->title }}</h5>
                    <div class="article-summary">{{$post->summary}}</div>
                    <a href="{{route('showArticle',[$post->id])}}" class="btn btn-primary">Xem bài viết</a>
                </div>
            </div>
        </div>
        @endforeach
        {{$posts->links()}}
    </div>
@endsection