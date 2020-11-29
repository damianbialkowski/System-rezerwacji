<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Modules\Admin\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    protected $loginPath = '/admin/login';
    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->redirectTo = route('admin.dashboard');
        $this->loginPath = route('admin.login');
        $this->redirectAfterLogout = route('admin.login');
        $this->middleware('guest:admin')->except('logout');
        \Illuminate\Support\Facades\Auth::setDefaultDriver('admin');
    }

    public function showLoginForm()
    {
        return $this->view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if ($this->guard()->attempt($request->only('email', 'password'), $request->remember_me)) {
            if ($this->guard()->user()->active == 0) {
                $this->guard()->logout();
                return redirect($this->redirectAfterLogout);
            }
            return redirect($this->redirectTo);
        }
        return redirect($this->loginPath);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(property_exists($this, 'redirectAfterLogout')
            ? $this->redirectAfterLogout : '');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
