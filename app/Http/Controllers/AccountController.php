<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Account;

class AccountController extends Controller
{
    public function accountList()
    {
        $accounts = DB::table('user')->get();
        return view('Account/accountList', compact('accounts'));
    }

    public function accountAdd()
    {
        return view('Account/accountAdd');
    }

    public function accountSave(Request $request)
    {
        $account = new Account();
        $account->userName = $request->input('userName');
        $account->userPass = $request->input('userPass');
        $account->userMail = $request->input('userMail');
        $account->userAddress = $request->input('userAddress');
        $account->userPhone = $request->input('userPhone');
        $account->userPhone = $request->input('userPhone');
        $account->insert();
        return redirect()->route('Account.accountList');
    }
}
