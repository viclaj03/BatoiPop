<?php

namespace App\Mail;

use App\Models\Article;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailBuyArticle extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Oferta Acceptada";
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
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
        return $this->view('mail.buy')->with(['date'=>$this->date]);
    }
}
