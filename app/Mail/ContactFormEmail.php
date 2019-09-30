<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posted_data)
    {
        $this->data = $posted_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contact-mail')
                    ->subject('Contact formulier ingevuld')
                    ->with([
                        'first_name'        => $this->data['first_name'],
                        'last_name'         => $this->data['last_name'],
                        'telephone'         => $this->data['telephone'],
                        'email'             => $this->data['email'],
                        'subject'           => $this->data['subject'],
                        'text_block'        => $this->data['text_block']
                    ]);
    }
}
