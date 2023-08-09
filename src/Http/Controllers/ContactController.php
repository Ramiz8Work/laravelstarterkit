<?php

namespace Ramiz\LaravelStarter\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ramiz\LaravelStarter\Mail\ContactMailable;
use Ramiz\LaravelStarter\Models\Contact;

class ContactController extends Controller
{
    public function getContactPage(){
        return view('contact::contact');
    }

    public function sendMailContact(Request $request){
        Mail::to(config('contact.send_mail_to'))->send(new ContactMailable($request->message,$request->name));
        Contact::create($request->except('_token'));
        return redirect()->back();
    }
}
