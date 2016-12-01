<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $orders = $event->getOrder();

        Mail::send('emails.orders', ['user' => $user, 'orders' => $orders], function ($m) use ($user) {
            $m->from('fernandopontes@outlook.com', 'Your Application');
            $m->to($user->email, $user->name)->subject('Your Reminder!');

        });
    }
}
