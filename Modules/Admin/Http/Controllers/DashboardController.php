<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Admin;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $user = \Auth::guard('admin')->user();
//        dd($user->getForbiddenAbilities());
//        \Bouncer::allow('Test')->to('create', Admin::class);
//        \Bouncer::assign('test')->to($user);
        return view('admin::dashboard');
    }


}
