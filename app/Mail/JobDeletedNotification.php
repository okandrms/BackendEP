<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobDeletedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $applicant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $applicant)
    {
        $this->job = $job;
        $this->applicant = $applicant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Job Posting Deleted')
                    ->view('emails.job_deleted_notification');
    }
}

