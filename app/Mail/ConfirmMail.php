<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->data->st == 'diterima') {
            return $this->subject('Permohonan Anda Diterima')
                ->view('pages.mail.confirm');
        } else {
            return $this->subject('Permohonan Anda Ditolak')
                ->view('pages.mail.reject');
        }
    }
}
