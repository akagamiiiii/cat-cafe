<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public array $contactInfo)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            //第1引数にメールアドレス、第2引数に差出人名
            from: new Address($this->contactInfo["email"], $this->contactInfo["name"]),
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
