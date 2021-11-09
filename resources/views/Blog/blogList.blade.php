<!DOCTYPE html>
<html>
<head>
    <title>List blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
    <a href="{{route('Blog.blogAdd')}}">Add</a>
    <table class="table">
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
        @foreach($blogs as $blog)
            <tr>
                <td>#{{$blog->blogId}}</td>
                <td>{{$blog->blogName}}</td>
                <td>{{$blog->blogInf}}</td>
                <td><img src="/image/{{ $blog->blogPicture }}" width="100px"></td>
                <td>{{$blog->blogContent}}</td>
                <td>{{$blog->userName}}</td>
                <td>{{$blog->categoryName}}</td>
                <td>{{$blog->createDate}}</td>
                <td>
                    <a href="/Blog/blogEdit/{{$blog->blogId}}">Edit</a>
                    <a href="Blog/blogDelete/{{$blog->blogId}}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
