<!DOCTYPE html>
<html>
<head></head>
<body>
{{--<a href="{{route('Category.categoryAdd')}}">Add</a>--}}
<table>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>pass</td>
        <td>mail</td>
        <td>address</td>
        <td>phone</td>
        <td>type</td>
        <td>Action</td>
    </tr>
    @foreach($admins as $admin)
        <tr>
            <td>{{$admin->userId}}</td>
            <td>{{$admin->userName}}</td>
            <td>{{$admin->userPass}}</td>
            <td>{{$admin->userMail}}</td>
            <td>{{$admin->userAddress}}</td>
            <td>{{$admin->userPhone}}</td>
            <td>{{$admin->userType}}</td>
            <td>
                {{--                <a href="/Category/categoryEdit/{{$category->categoryId}}">Edit</a>--}}
            </td>
            <td>
                {{--                <a href="Category/categoryDelete/{{$category->categoryId}}">Delete</a>--}}
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
