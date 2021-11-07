<!DOCTYPE html>
<html>
<head></head>
<body>
    <a href="{{route('Category.categoryAdd')}}">Add</a>
    <table>
        <tr>
            <td>ID</td>
            <td>Name category</td>
            <td>Type category</td>
            <td>Action</td>
        </tr>
        @foreach($category as $category)
        <tr>
            <td>{{$category->categoryId}}</td>
            <td>{{$category->categoryName}}</td>
            <td>{{$category->categoryType}}</td>
            <td>
                <a href="/Category/categoryEdit/{{$category->categoryId}}">Edit</a>
            </td>
            <td>
                <a href="Category/categoryDelete/{{$category->categoryId}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
