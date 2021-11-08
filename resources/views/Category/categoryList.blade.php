<!DOCTYPE html>
<html>
<head></head>
<body>
    <a href="{{route('Category.categoryAdd')}}">Add</a>
    <table border="1" width="100%">
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
            <td>
                @if($category->categoryType==1)
                    hide
                @else
                    show
                @endif
            </td>
            <td>
                <a href="/Category/categoryEdit/{{$category->categoryId}}">Edit</a>
                <a href="Category/categoryDelete/{{$category->categoryId}}">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
