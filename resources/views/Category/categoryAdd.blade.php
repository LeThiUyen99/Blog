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
                <label><input type="radio" name="categoryType" value="0" checked>hide</label>
                <label><input type="radio" name="categoryType" value="1">show</label>
            </div>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
