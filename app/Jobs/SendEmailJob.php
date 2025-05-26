<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Log;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    public $emailData;
    /**
     * Create a new job instance.
     */
    public function __construct(array $emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
        Mail::to($this->emailData['mail_to'])->send(new SendEmail(
            $this->emailData['mail_subject'],
            $this->emailData['mail_body'],
            $this->emailData['mail_attachments'] ?? []
        ));

        
    }
}
