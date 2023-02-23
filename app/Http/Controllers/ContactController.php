<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Notifications\ModelCreatedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    // Create Contact Form
    public function createForm(Request $request) {
        return view('front.contact');
      }
  
    // Store Contact Form data
    public function ContactUsForm(Request $request) {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject'=>'required',
            'message' => 'required'
         ]);
        //  Store data in database
       $contact = Contact::create($request->all());
       $contact->notify(new ModelCreatedNotification($contact));
        // 
           //  Send mail to admin
        try {
            Mail::send('front.mail', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'user_query' => $request->get('message'),
            ), function($message) use ($request){
                $message->from($request->email);
                $message->to('lesamisdenzong.fondationcandia@gmail.com', 'Admin')->subject($request->get('subject'));
            });
            return back()->with('success', __('We have received your message and would like to thank you for writing to us.'));
        } catch (\Throwable $th) {
            echo('connection failed!');
        }
    }
}
