<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
        // dd($users);

        if(!$item){
            $subscribe = Newsletter::create([
                'user_id' => Auth::user()->id,
                'email' => $request->email,
            ]);
            if($subscribe){
                Mail::send('emails.subscribe_newsletter',['users' => $user], function($message) use ($subscribe){
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

}
