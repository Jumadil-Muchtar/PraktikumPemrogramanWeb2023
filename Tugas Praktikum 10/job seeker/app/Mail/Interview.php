<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Interview extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;

    public function __construct($interview)
    {
        $this->interview = $interview;
    }

    public function build()
    {
        return $this->view('email.InterviewInfo');
    }
}

?>
