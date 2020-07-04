<?php

namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Modules\Admin\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Modules\Admin\Http\Requests\LoginRequest;
use \Auth;

class LoginController extends Controller
{
    use ThrottlesLogins;

    protected $redirectTo = '/admin';
    protected $loginPath = '/admin/login';
    protected $redirectAfterLogout = '/admin/login';

    public function __construct()
    {
        $this->redirectTo = route('admin.dashboard');
        $this->loginPath = route('admin.login');
        $this->redirectAfterLogout = route('admin.login');
    }

    public function showLoginForm()
    {
        return $this->view('auth.login');
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
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            if (Auth::guard('admin')->user()->active == 0) {
                Auth::guard('admin')->logout();
                return redirect($this->redirectAfterLogout);
            }
            $request->session()->regenerate();
            return redirect($this->redirectTo);
        }
        return redirect($this->loginPath);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(property_exists($this, 'redirectAfterLogout')
            ? $this->redirectAfterLogout : '');
    }
}
