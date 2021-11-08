<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Category</title>
</head>
<body>
@if(Session::has('blogEdit'))
    <span>{{Session::get('blogEdit')}}</span>
@endif
<form method="post" action="{{route('Blog.blogUpdate', [ 'id'=> $blogs->blogId ])}}">
    @csrf
    <div>
        <label>Category</label>
        <input type="text" name="createDate" value="{{$blogs->createDate}}">
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="updateDate" value="{{$blogs->updateDate}}">
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="blogName" value="{{$blogs->blogName}}">
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="blogInf" value="{{$blogs->blogInf}}">
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="blogPicture" value="{{$blogs->blogPicture}}">
    </div>
    <div>
        <label>Category</label>
        <input type="text" name="blogContent" value="{{$blogs->blogContent}}">
    </div>
    <div>
        <label>Author</label>
        <select name="userId">
            <option>---------------------</option>
            @foreach($users as $user)
                <option value="{{ $user['userId'] }}">{{ $user['userName'] }}</option>
            @endforeach
        </select>
    </div>
        <label>Category</label>
        <select name="categoryId">
            <option>---------------------</option>
            @foreach($categories as $category)
                <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>
