<!DOCTYPE html>
<html>
<head></head>
<body>
<a href="{{route('Account.accountAdd')}}">Add</a>
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
    @foreach($accounts as $account)
        <tr>
            <td>{{$account->userId}}</td>
            <td>{{$account->userName}}</td>
            <td>{{$account->userPass}}</td>
            <td>{{$account->userMail}}</td>
            <td>{{$account->userAddress}}</td>
            <td>{{$account->userPhone}}</td>
            <td>{{$account->userType}}</td>
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
