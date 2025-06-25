<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //差出人
            from: "user@example.com",
            //件名
            subject: 'お問い合わせがありました。',
        );
    }

    /**
     * Get the message content definition.
     */
    //メール本文のviewファイルをここに指定
    public function content(): Content
    {
        return new Content(
            //テキストメールなので、引数にtextを指定
            text: 'emails.contact.admin',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    //添付ファイルを指定
    public function attachments(): array
    {
        return [];
    }
}
