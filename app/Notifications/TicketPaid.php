<?php

namespace App\Notifications;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TicketPaid extends Notification
{
    use Queueable;

    public Cart $cart_paid;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cart $cart_paid)
    {
        $this->cart_paid = $cart_paid;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🎉 ¡Felicidades, ya puede participar en nuestro evento!')
            ->from('no-reply@bitkets.com', 'BitKets')
            ->view('emails.ticket', ['cart_paid' => $this->cart_paid]);
    }
}
