<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;

class LoginHistoryController extends Controller
{
    public function index()
    {
        $loginHistories = LoginHistory::with('user')->orderBy('login_time', 'desc')->paginate(10);
        return view('admin.login_histories.index', compact('loginHistories'));
    }
}
?>
