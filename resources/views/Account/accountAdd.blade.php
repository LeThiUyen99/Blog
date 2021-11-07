<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Category</title>
</head>
<body>
@if(Session::has('accountAdd'))
    <span>{{Session::get('accountAdd')}}</span>
@endif
<form method="get" action="{{route('Account.accountSave')}}">
    @csrf
    <div>
        <label>Account</label>
        <input type="text" name="userName">
    </div>
    <div>
        <label>pass</label>
        <input type="password" name="userPass">
    </div>
    <div>
        <label>mail</label>
        <input type="text" name="userMail">
    </div>
    <div>
        <label>address</label>
        <input type="text" name="userAddress">
    </div>
    <div>
        <label>phone</label>
        <input type="text" name="userPhone">
    </div>
    <div>
        <label>type</label>
        <input type="text" name="userType">
    </div>
    <input type="submit" value="Submit">
</form>
</body>
</html>
