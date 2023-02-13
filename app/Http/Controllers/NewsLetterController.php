<?php

namespace App\Http\Controllers;

use App\Models\Newsletter as ModelsNewsletter;
use App\Models\Unsubscriber;
use App\Notifications\ModelCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function create()
    {
        return view('front.newsletter');
    }

    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.ModelsNewsletter::class],
        ]);
          Mail::send('front.newsletter-confirmation', array(
                'email' => $request->get('email'),
            ), function($message) use($request){
                $message->to($request->email);
                $message->subject('Newsletter Confirmation');
                return back()->with('sending','value');
            });
            return response()->json('subscribe');
    }
    
    public function store($email){
        $subscriber = ModelsNewsletter::UpdateOrCreate([
            'email' => $email,
        ]);
        $subscriber->notify(new ModelCreatedNotification($subscriber));
        Mail::send('front.newsletter-welcome', array(
            'email' => $email,
        ), function($message) use($email){
            $message->to($email);
            $message->subject('AmisDeNzong Subscription Confirmation');
        });
        return back()->with('modal','value');
    }
    public function unsubscribe($email){
        $newsletter = ModelsNewsletter::where('email',$email)->get();
        if($newsletter->count() > 0){
            ModelsNewsletter::destroy($newsletter[0]->id);
            Unsubscriber::UpdateOrCreate([
                'email' => $email,
            ]);
        }
        return back()->with('unsubscribe',$email);
    }
}
