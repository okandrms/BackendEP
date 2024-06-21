<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; 
use App\Models\Employer; 
class JobApplicationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $employer;
    public $company_name;

    public function __construct(User $user, Employer $employer)
    {
        $this->user = $user;
        $this->employer = $employer;
        $this->company_name = $employer->company_name;
    }

    public function build()
    {
        return $this->view('emails.job_application_received')
                    ->subject('Job Application Received')
                    ->with([
                        'user' => $this->user, 
                        'company_name' => $this->company_name,
                    ]);
    }
}

