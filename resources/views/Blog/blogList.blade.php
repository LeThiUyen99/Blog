@extends('main-dashboard')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Danh sách bài viết
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif
    <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
        <a href="{{route('Blog.blogAdd')}}" class="btn btn-primary">Thêm bài viết</a>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
            <div class="input-group">
                <input type="text" class="input-sm form-control" placeholder="Search">
                <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped b-t b-light">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name blog</th>
                <th>Info blog</th>
                <th>picture</th>
                <th>content</th>
                <th>author</th>
                <th>category</th>
                <th>create date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($blogs as $blog)
                <tr>
                    <td>#{{$blog->id}}</td>
                    <td>{{$blog->blogName}}</td>
                    <td>{!! $blog->blogInf !!}</td>
                    <td><img src="{{asset($blog->blogPicture)  }}" width="100px"></td>
                    <td>{!! $blog->blogContent !!}</td>
                    <td>{{$blog->account->userName}}</td>
                    <td>{{$blog->category->categoryName}}</td>
                    <td>{{$blog->createDate}}</td>
                    <td>
                        <a href="/Blog/blogEdit/{{$blog->id}}" class="btn btn-primary">Edit</a>
                        <a href="Blog/blogDelete/{{$blog->blogId}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
@endsection
@section('style-js')
    <script>
        $('div.alert').delay(5000).slideUp(300);
    </script>
@endsection
