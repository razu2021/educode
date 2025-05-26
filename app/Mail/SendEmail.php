<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $body;
    public $mail_attachments;

    /**
     * Create a new message instance.
     */
    public function __construct($mail_subject,$mail_body,$mail_attachments =[])
    {
        $this->subject = $mail_subject;
        $this->body = $mail_body;
        $this->mail_attachments = $mail_attachments;

        
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.send-email'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
public function attachments(): array
{
    Log::debug('Inside attachments():', ['attachments' => $this->mail_attachments]);

    $attachmentList = [];

    foreach ($this->mail_attachments as $index => $fileName) {
        if (!is_string($fileName)) {
            Log::warning('Attachment is not a string', ['index' => $index, 'value' => $fileName]);
            continue;
        }

        $fullPath = public_path('storage/uploads/email/attachments/' . $fileName);

        if (file_exists($fullPath)) {
            $attachment = Attachment::fromPath($fullPath)
                ->as($index.'_'.basename($fileName))
                ->withMime(mime_content_type($fullPath));

            Log::info('Prepared attachment', ['class' => get_class($attachment), 'path' => $fullPath]);

            $attachmentList[] = $attachment;
        } else {
            Log::warning('Attachment file not found', ['path' => $fullPath]);
        }
    }

    return array_values($attachmentList);
}

        








}