<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;


class MyJobApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->jobApplications()
            ->with([
                'job' => fn($query) => $query->withCount('jobApplications')
                    ->withAvg('jobApplications', 'expected_salary')
                    ->withTrashed(),
                'job.employer'
            ])
            ->latest()
            ->get();

        $jobDeleted = $applications->contains(fn($application) => $application->job && $application->job->trashed());

        if ($jobDeleted) {
            session()->flash('jobDeleted', 'The job associated with this application has been deleted.');
        }

        return view('my_job_application.index', compact('applications'));
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with(
            'success',
            'Job application removed.'
        );
    }
}