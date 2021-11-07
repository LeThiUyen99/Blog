<!DOCTYPE html>
<html lang="vi">
    <head>
        <title>Category</title>
    </head>
    <body>
    @if(Session::has('categoryAdd'))
        <span>{{Session::get('categoryAdd')}}</span>
    @endif
        <form method="get" action="{{route('Category.categorySave')}}">
            @csrf
            <div>
                <label>Category</label>
                <input type="text" name="categoryName">
            </div>
            <div>
                <label>Category type</label>
                <input type="text" name="categoryType">
            </div>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
