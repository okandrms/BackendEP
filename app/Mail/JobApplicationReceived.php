<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; // Import User model
use App\Models\Employer; // Import Employer model

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
                        'user' => $this->user, // Pass user object to the view
                        'company_name' => $this->company_name,
                    ]);
    }
}

