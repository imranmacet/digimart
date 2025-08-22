<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactRequest;
use App\Models\ContactInfoSection;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function index() : View
    {
        $contact = ContactInfoSection::first();
        return view('frontend.pages.contact', compact('contact'));    
    }

    function sendMail(ContactRequest $request) : RedirectResponse
    {
         MailSenderService::sendContactMail(
            name: $request->name,
            subject: $request->subject,
            content: $request->message,
            formMail: $request->email,
            toMail: config('settings.site_email')
         );

         NotificationService::CREATED('Mail sended successfully');
         
         return back();
    }
}
