<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVerify;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        $token = Str::random(64);
         UserVerify::create([
              'user_id' => $user->id, 
              'token' => $token
            ]);
  
        Mail::send('verification-email', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });

        // Auth::login($user);
        return back()->with('status', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        // return redirect(RouteServiceProvider::HOME);
    }
    
    public function update(Request $request)
{
    $values = $request->only(['name', 'email']);

    $rules = [
        'name' => 'required|max:255|unique:users,name,' . $request->user()->id,
        'email' => 'required|email|max:255|unique:users,email,' . $request->user()->id,
    ];

    if($request->password) {
        $rules['password'] = 'string|confirmed|min:8';
        $values['password'] =  Hash::make($request->password);
    }

    $request->validate($rules);

    $request->user()->update($values);
    
    return back()->with('status', __('You have been successfully updated.'));
}
}
