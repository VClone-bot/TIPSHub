<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventNotificationMail;
use App\Models\NewsSub;

class SendNewEventListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $subs = NewsSub::all(); 
        foreach($subs as $sub) {
            Mail::to($sub->email)->send(new EventNotificationMail($event));
        }
    }
}
