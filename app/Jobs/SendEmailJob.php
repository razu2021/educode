<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailSetup;
use Illuminate\Support\Facades\Config;

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

        $mail = EmailSetup::where('public_status',1)->first();

        if($mail){
            Config::set('mail.default', $mail->mailer);
            Config::set('mail.mailers.smtp.host', $mail->host);
            Config::set('mail.mailers.smtp.port', $mail->port);
            Config::set('mail.mailers.smtp.username', $mail->username);
            Config::set('mail.mailers.smtp.password', $mail->password); // যদি encrypt করা থাকে, তাহলে decrypt() করুন
            Config::set('mail.mailers.smtp.encryption', $mail->encryption);

            Config::set('mail.from.address', $mail->from_address);
            Config::set('mail.from.name', $mail->from_name);
        }





        
        Mail::to($this->emailData['mail_to'])->send(new SendEmail(
            $this->emailData['mail_subject'],
            $this->emailData['mail_body'],
            $this->emailData['mail_attachments'] ?? []
        ));

        
    }
}
