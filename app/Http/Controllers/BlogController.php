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
        $request->validate([
            'blogPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = [
            'createDate' => $request->createDate,
            'blogName' => $request->blogName,
            'blogInf' => $request->blogInf,
            'blogPicture' => $request->blogPicture,
            'blogContent' => $request->blogContent,
            'userId' => $request->userId,
            'categoryId' => $request->categoryId
        ];
        if ($blogPicture = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $blogPicture->getClientOriginalExtension();
            $blogPicture->move($destinationPath, $profileImage);
            $data['blogPicture'] = "$profileImage";
        }
//        if ($request->hasFile('blogPicture')) {
//            $file = $request->hasFile('blogPicture');
//            $duoi = $file->getClientOriginalExtension();
//        }

        Blog::create($data);
        return redirect()->route('Blog.blogList');
    }

    public function blogEdit($id)
    {
        $users = Account::all();
        $categories = Category::all();

        $blogs = DB::table('blog')
            ->join('user', 'blog.userId', '=', 'user.userId')
            ->join('category', 'blog.categoryId', '=', 'category.categoryId')
            ->where('blogId', $id)->first();

        return view('Blog/blogEdit', [
            'users' => $users,
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function blogUpdate(Request $request, $id)
    {
//                echo ($id);
//        return
//        dd($request->all());
        $data = $request->all();
        if ($image = $request->file('blogPicture')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['blogPicture'] = "$profileImage";
        }else{
            unset($data['blogPicture']);
        }

        Blog::updated(
            ['id' =>$id],
            $data);
        return redirect()->route('Blog.blogList');
    }
    public function blogDelete($id)
    {
        DB::table('blog')->where('blogId', $id)->delete();
        return redirect()->route('Blog.blogList');
    }
}
