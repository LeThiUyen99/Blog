<!DOCTYPE html>
<html>
<head></head>
<body>
<a href="{{route('Account.accountAdd')}}">Add</a>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>pass</td>
        <td>mail</td>
        <td>address</td>
        <td>phone</td>
        <td>type</td>
    </tr>
    @foreach($accounts as $account)
        <tr>
            <td>{{$account->userId}}</td>
            <td>{{$account->userName}}</td>
            <td>{{$account->userPass}}</td>
            <td>{{$account->userMail}}</td>
            <td>{{$account->userAddress}}</td>
            <td>{{$account->userPhone}}</td>
            <td>
                @if($account->userType == 1)
                    show
                @else
                    hide
                @endif
            </td>
        </tr>
    @endforeach
</table>
</body>
</html>
