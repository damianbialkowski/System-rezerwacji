<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use Flash;
use Auth;
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        // return redirect('/');
        // $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request,User $user)
    {

        $user->create([
            'username' => $request->username,
            'role_id' => 2,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if($user){
            if(Auth::attempt(['email' => $request->get('email'),'password' => $request->get('password')])){
                return redirect('/')->with(['success' => 'Konto zostało pomyślnie utworzone']);
                
            }
        }
    }

}
