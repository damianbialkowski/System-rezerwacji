<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Admin;

class DashboardController extends Controller
{

    public function __construct()
    {
//        dd(5);
    }

    public function dashboard()
    {
//        $user = Auth::user();
        return view('admin.dashboard', ['item' => $item, 'user' => $user]);
        return view('admin::dashboard');
    }


}
