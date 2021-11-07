<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Blog</title>
</head>
<body>
@if(Session::has('blogAdd'))
    <span>{{Session::get('blogAdd')}}</span>
@endif
<form method="post" action="{{route('Blog.blogSave')}}">
    @csrf
    <div>
        <label>Create date</label>
        <input type="date"  name="createDate">
    </div>
{{--    <div>--}}
{{--        <label>Update date</label>--}}
{{--        <input type="date" name="updateDate">--}}
{{--    </div>--}}
    <div>
        <label>Blog</label>
        <input type="text" name="blogName">
    </div>
    <div>
        <label>Info</label>
        <input type="text" name="blogInf">
    </div>
    <div>
        <label>Picture</label>
        <input type="text" name="blogPicture">
    </div>
    <div>
        <label>Content</label>
        <input type="text" name="blogContent">
    </div>
    <div>
        <label>author</label>
        <select name="userId">
            <option value="">------</option>
            @foreach($users as $user)
                <option value="{{ $user['userId'] }}">{{ $user['userName'] }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Category</label>
        <select name="categoryId">
            <option value="">------</option>
            @foreach($categories as $category)
                <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>
