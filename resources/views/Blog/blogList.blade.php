<!DOCTYPE html>
<html>
<head></head>
<body>
<a href="{{route('Blog.blogAdd')}}">Add</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name blog</td>
        <td>Info blog</td>
        <td>picture</td>
        <td>content</td>
        <td>author</td>
        <td>category</td>
        <td>create date</td>
        <td>update date</td>
        <td>Action</td>
    </tr>
    @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->blogId}}</td>
            <td>{{$blog->blogName}}</td>
            <td>{{$blog->blogInf}}</td>
            <td>{{$blog->blogPicture}}</td>
            <td>{{$blog->blogContent}}</td>
            <td>{{$blog->userId}}</td>
            <td>{{$blog->categoryId}}</td>
            <td>{{$blog->createDate}}</td>
            <td>{{$blog->updateDate}}</td>
            <td>
                <a href="/Blog/blogEdit/{{$blog->blogId}}">Edit</a>
                <a href="Blog/blogDelete/{{$blog->blogId}}">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
