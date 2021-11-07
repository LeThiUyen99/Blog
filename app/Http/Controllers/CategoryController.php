<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryAdd()
    {
        return view('Category/categoryAdd');
    }

    public function categorySave(Request $request)
    {
        $category = new Category();
        $category->categoryName = $request->input('categoryName');
        $category->categoryType = $request->input('categoryType');
        $category->insert();
        return redirect()->route('Category.categoryList');
    }

    public function categoryList()
    {
        $category = DB::table('category')->get();
        return view('Category/categoryList', compact('category'));
    }

    public function categoryEdit($id)
    {
        $category = DB::table('category')->where('categoryId', $id)->first();
        return view('Category/categoryEdit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
//        echo ($id);
//        return
//        dd($request->all());
        DB::table('category')->where('categoryId', $request->id)->update([
            'categoryName'=>$request->input('categoryName'),
            'categoryType'=>$request->input('categoryType')
        ]);
        return redirect()->route('Category.categoryList');
    }

    public function categoryDelete($id)
    {
        DB::table('category')->where('categoryId', $id)->delete();
        return redirect()->route('Category.categoryList');
    }
}
