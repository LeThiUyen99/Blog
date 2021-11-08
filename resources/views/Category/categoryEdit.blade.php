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
        <label><input type="radio" name="categoryType" value="0" checked>hide</label>
        <label><input type="radio" name="categoryType" value="1">show</label>
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>
