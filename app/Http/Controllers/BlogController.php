<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function blogList()
    {
        $blogs = Blog::query()->with('account')->with('category')->get();
        return view('Blog/blogList', compact('blogs'));
    }

    public function blogAdd()
    {
        $account = Account::all();
        $categories = Category::all();
        return view('Blog/blogAdd', compact('account', 'categories'));
    }

    public function blogSave(Request $request)
    {
        $request->validate([
            'blogPicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
            $image = $request->file('blogPicture');
            $imageName = rand(1, 1000) . '_' . time() . '_blog' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog/'), $imageName);
        $data = [
            'createDate' => $request->createDate,
            'blogName' => $request->blogName,
            'blogInf' => $request->blogInf,
            'blogPicture' => 'images/blog/' . $imageName,
            'blogContent' => $request->blogContent,
            'userId' => $request->userId,
            'categoryId' => $request->category,
        ];

        Blog::create($data);
        return redirect()->route('Blog.blogList')->with('message', 'Thêm mới Voucher thành công');
    }

    public function blogEdit($id)
    {
        $account = Account::all();
        $categories = Category::all();
        $blogs = Blog::query()->with('category')->with('account')->find($id);
        return view('Blog/blogEdit', [
            'account' => $account,
            'categories' => $categories,
            'blogs' => $blogs
        ]);
    }

    public function blogUpdate(Request $request,$id)
    {
//        dd($request->all());
        $blog = Blog::find($request->id);

        if ($blog) {
            if ($request->all('blogPicture')['blogPicture']) {
                $this->validate($request, [
                    'blogName' => 'required|string|max:255|min:10',
                    'blogInf' => 'required|string|min:10',
                    'blogContent' => 'required|string|min:10',
                    'blogPicture' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
                ]);

                $image = $request->file('blogPicture');
                $imageName = rand(1, 1000) . '_' . time() . '_blog' . '.' . $image->getClientOriginalExtension();
//                dd($imageName);
                $image->move(public_path('images/blog/'), $imageName);
                $blog->blogPicture = 'images/blog/' . $imageName;

            }

            $blog->blogName = $request->blogName;
            $blog->blogInf = $request->blogInf;
            $blog->blogContent = $request->blogContent;
            $blog->userId = $request->userId;
            $blog->categoryId = $request->category;
            $blog->save();
            return redirect(route('Blog.blogList'))->with('message', 'Cập nhật  bài viết thành công');
        }else{
            var_dump("khong tim thay post");
        }

    }

    public function blogDelete($id)
    {
        DB::table('blog')->where('blogId', $id)->delete();
        return redirect()->route('Blog.blogList');
    }
}
