<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public $subject;
    public $isi;
    public $files;
    public function __construct($email, $subject, $isi, $files)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->isi = $isi;
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $hasil = $this->from($this->email)->subject($this->subject)->view("mail.content", ["text" => $this->isi]);
        foreach ($this->files as $file) {
            $hasil = $hasil->attach(public_path("/storage/Lampiran_Tugas/".$file));
        }
        return $hasil;
    }
}
