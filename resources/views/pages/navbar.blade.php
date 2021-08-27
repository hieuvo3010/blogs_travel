
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('homepage')}}">Trang chủ <span class="sr-only">(current)</span></a>
        </li>
        @foreach($categories as $category)
        <li class="nav-item">
          <a class="nav-link" href="{{route('showCategory',[$category->id])}}">{{$category->title}}</a>
        </li>
        @endforeach  
      </ul>
      <form method="GET" class="form-inline my-2 my-lg-0" action="{{route('searchBlog')}}">
        <input class="form-control mr-sm-2" type="text" name="tukhoa" placeholder="Tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm blogs</button>
      </form>
    </div>
  </nav>
