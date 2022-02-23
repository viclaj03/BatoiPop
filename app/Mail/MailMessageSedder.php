<?php

namespace App\Mail;

use App\Models\Article;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMessageSedder extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Nuevo mensaje";
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $article)
    {
        $this->date = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.message')->with(['date'=>$this->date]);
    }
}
