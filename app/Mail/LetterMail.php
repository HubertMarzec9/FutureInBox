<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Letter;

class LetterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $letter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Letter $letter)
    {
        $this->letter = $letter;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Future In Box: ' . $this->letter->title)
            ->view('mail.letter', [
                'letter' => $this->letter
            ]);
    }
}
