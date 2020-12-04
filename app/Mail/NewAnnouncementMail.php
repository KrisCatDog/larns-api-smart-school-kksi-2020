<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAnnouncementMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $mailSubject;
    private $recipient;
    private $classroom;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailSubject, $recipient, $classroom)
    {
        $this->mailSubject = $mailSubject;
        $this->recipient = $recipient;
        $this->classroom = $classroom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new-announcement')
            ->subject('New announcement posted! ' . $this->mailSubject)
            ->with([
                'recipient' => $this->recipient,
                'classroom' => $this->classroom,
            ]);
    }
}
