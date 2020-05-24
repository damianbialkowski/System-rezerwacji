<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Admin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Modules\Admin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';
    protected $loginPath = '/admin/login';
    protected $redirectAfterLogout = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin::auth.login');
    }

//    protected function validateLogin(Request $request)
//    {
//        $request->validate([
//            'email' => 'required|string',
//            'password' => 'required|string',
//        ]);
//    }

    public function postLogin(LoginRequest $request)
    {

        if (\Auth::attempt($request->except('_token'))) {
            $request->session()->regenerate();
            return redirect($this->redirectTo);
        }
        return redirect($this->loginPath);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect($this->loginPath);
    }
}
