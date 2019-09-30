<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallMeEmail extends Mailable
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
        return $this->view('email.call-me-mail')
                    ->subject('Verzoek om teruggebeld te worden')
                    ->with([
                        'userName' => $this->data['name'],
                        'telephone' => $this->data['telephone'],
                        'product' => $this->data['product']
                    ]);
    }
}
