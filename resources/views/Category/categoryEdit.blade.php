<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Category</title>
</head>
<body>
@if(Session::has('categoryEdit'))
    <span>{{Session::get('categoryEdit')}}</span>
@endif
<form method="get" action="{{route('Category.categoryUpdate', [ 'id'=> $category->categoryId ])}}">
    @csrf
    <div>
        <label>Category</label>
        <input type="text" name="categoryName" value="{{$category->categoryName}}">
    </div>
    <div>
        <label>Category type</label>
        <input type="text" name="categoryType" value="{{$category->categoryType}}">
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>
