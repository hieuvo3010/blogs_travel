@extends('layout')
@section('content')
<style>
ul.list-people-care li {
    font-size: 30px;
    text-transform: uppercase;
}
ul.list-people-care li a{
    text-decoration: none;
    font-size: 20px;
    color: #000;
}
 
</style>
<div class="jumbotron container">
    <h1 class="display-4">{{$post_detail->title}}</h1>
    <img src="{{asset('uploads/'.$post_detail->image)}}" width="25%" height="25%">
    <p class="lead">{{$post_detail->summary}}</p>
    <hr class="my-4">
    <p>{{$post_detail->content}}</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
 </div>

 <div class="jumbotron container">
  <h1 class="display-4">Có thể bạn quan tâm</h1>
  <ul class='list-people-care'>
    @foreach($cares as $care)
    <li><a href="{{route('showArticle',[$care->id])}}">{{$care->title}}</a></li>
    @endforeach
  </ul>
</div>


@endsection