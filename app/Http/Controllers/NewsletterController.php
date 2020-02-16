<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsletterReqest;
use App\Newsletter;
use Auth;
use App\User;
use Mail;

class NewsletterController extends Controller
{

    public function subscribe(NewsletterReqest $request)
    {
        $item = Newsletter::where('email','=',$request->get('email'))->exists();
        $user = User::findOrFail(Auth::user()->id)->toArray();
        // dd($user);

        if(!$item){
            $subscribe = Newsletter::create([
                'user_id' => Auth::user()->id,
                'email' => $request->email,
            ]);
            if($subscribe){
                Mail::send('emails.subscribe_newsletter',['user' => $user], function($message) use ($subscribe){
                    $message->subject('Rejestracja do Newslettera');
                    $message->from(env('MAIL_USERNAME',''),env('MAIL_FROM_NAME'));
                    $message->to($subscribe->email,'');
                });
                return redirect()->back()->with('success','Pomyślnie zapisałeś/aś się do newslettera!');
            }else {
                return redirect()->back()->with('failure','Coś poszło nie tak! Spróbuj ponownie!');
            }
        }
        return redirect()->back()->with('failure','Podany adres e-mail jest już zarejestrowany!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
