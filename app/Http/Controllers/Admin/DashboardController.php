<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Auth;

class DashboardController extends Controller
{

    public function main()
    {
        $item = new Article;
        $user = Auth::user();
        return view('admin.dashboard', ['item' => $item, 'user' => $user]);
    }
}
