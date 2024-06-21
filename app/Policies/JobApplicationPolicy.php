<?php

namespace App\Policies;

use App\Models\User;
use App\Models\JobApplication;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the job application.
     */
    public function view(User $user, JobApplication $application)
    {
        
        return $user->id === $application->user_id || $user->role === 'employer';
    }

}
