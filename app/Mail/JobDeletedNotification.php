<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Job;
use App\Models\User;
use App\Models\Employer;

class JobDeletedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $applicant;
    public $employer;
    public $company_name;

    /**
     * Create a new message instance.
     *
     * @param Job $job
     * @param User $applicant
     * @param Employer $employer
     * @return void
     */
    public function __construct(Job $job, User $applicant, Employer $employer)
    {
        $this->job = $job;
        $this->applicant = $applicant;
        $this->employer = $employer;
        $this->company_name = $employer->company_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.job_deleted_notification')
                    ->subject('Job Posting Deleted')
                    ->with([
                        'job' => $this->job,
                        'applicant' => $this->applicant,
                        'company_name' => $this->company_name,
                    ]);
    }
}
