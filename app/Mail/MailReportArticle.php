<?php

namespace App\Mail;

use App\Models\ReportArticle;
use App\Models\ReportMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailReportArticle extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Articulo Denunciado";
    public $date;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ReportArticle $report)
    {
        $this->date = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('mail.reportarticle')->with(['user'=>$this->date]);
    }
}
