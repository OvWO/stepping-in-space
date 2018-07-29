<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactLuis extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($email, $name, $message)
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Try to send the message with the sender Email Address else,
     * send it with my own address.
     *
     * @return $this
     */
    public function build()
    {
        try {
            return $this
                ->from($this->data['email'])
                ->view('mail.contact')
                ->with([
                    'data' => $this->data,
                ]);
        } catch (Exception $e) {
            return $this
                ->view('mail.contact')
                ->with([
                    'data' => $this->data,
                ]);
        }
    }
}
