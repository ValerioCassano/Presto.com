<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;
 use Illuminate\Mail\Mailables\Envelope;

class BecomeRevisor extends Mailable
{
    use Queueable, SerializesModels;
    
    /**
     * Create a new message instance.
     */
    public $user;
   
    public $user_message;
    public function __construct($user, $messaggio)
    {
        $this->user= $user;
        $this->user_message = $messaggio;
    }
    

    // build the message


    public function build()
    {
        return $this->from('presto.it@noreply.com')->view('mail.become_revisor');
    }
    /**
     * Get the message envelope.
     */
     public function envelope(): Envelope
    {
         return new Envelope(
            subject: 'Become Revisor',
        );
     }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.become_revisor',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


}

