<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subjectText;
    public $bodyText;
    public $customData;

    public function __construct($subjectText, $bodyText, $customData = [])
    {
        $this->subjectText = $subjectText;
        $this->bodyText = $bodyText;
        $this->customData = $customData;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
            ->view('emails.general')
            ->with([
                'bodyText' => $this->bodyText,
                'customData' => $this->customData,
            ]);
    }
}
