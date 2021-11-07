<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
class BlogController extends Controller
{
    public function blogList()
    {
        $blogs = DB::table('blog')
            ->join('user', 'blog.userId', '=', 'user.userId')
            ->join('category', 'blog.categoryId', '=', 'category.categoryId')
            ->get();
        return view('Blog/blogList', compact('blogs'));
    }

    public function blogAdd() {
        $users = Account::all();
        $categories = Category::all();

        return view('Blog/blogAdd', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function blogSave(Request $request) {
        $data = [
            'createDate' => $request->createDate,
//            'updateDate' => $request->updateDate,
            'blogName' => $request->blogName,
            'blogInf' => $request->blogInf,
            'blogPicture' => $request->blogPicture,
            'blogContent' => $request->blogContent,
            'userId' => $request->userId,
            'categoryId' => $request->categoryId
        ];

        Blog::create($data);
    }
}
