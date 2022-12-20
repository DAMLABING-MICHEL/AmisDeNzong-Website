<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
   
    public function dashboard()
    {
        if(Auth::check()){
            return redirect('/');
        }
  
        // return redirect("login")->withSuccess('Opps! You do not have access');
        return redirect("login")->with('status','Opps! You do not have access');
    }
    
    public function verifyAccount($token)
    {
        $verifyUser = User::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            // $user = $verifyUser->user;
              
            if(!$verifyUser->is_email_verified) {
                $verifyUser->is_email_verified = 1;
                $verifyUser->valid = 1;
                $verifyUser->email_verified_at = Carbon::now();
                $verifyUser->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('status', $message);
    }
}
