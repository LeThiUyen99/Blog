<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminController extends Controller
{
    public function adminList()
    {
        $admins = DB::table('admin')->get();
        return view('Admin/adminList', compact('admins'));
    }

    public function adminAdd()
    {}
}
