<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct(){
        $this->middleware('guest')->except('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cookie = \Cookie::forget('laravel_cookie_consent');
        

        // dd(\Cookie::get('laravel_cookie_consent'));
        return \Response::view('auth.login')->withCookie($cookie);
    }

    public function login(LoginRequest $request)
    {
        // dd($request->all());
        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$request->get('remember'))){
            return redirect('/');
        }
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        if(Auth::user()){
            Auth::logout();
            return redirect('/')->with('message','Zostałeś/aś wylogowany!');
        }
    }

}
