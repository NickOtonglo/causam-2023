<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ContactInfoSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class SendContactFormEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ContactInfoSubmitted  $event
     * @return void
     */
    public function handle(ContactInfoSubmitted $event)
    {
        Mail::send(new ContactFormMail($event->mail));
    }
}
