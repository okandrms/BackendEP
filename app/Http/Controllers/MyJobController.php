<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\JobRequest;
use App\Mail\JobDeletedNotification;
use Illuminate\Support\Facades\Mail;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index()
    {
        $this->authorize('viewAnyEmployer', Job::class);
        return view(
            'my_job.index',
            [
                'jobs' => auth()->user()->employer
                    ->jobs()
                    ->with(['employer', 'jobApplications', 'jobApplications.user'])
                   
                    ->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);
        auth()->user()->employer->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job created successfully.');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);
        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $this->authorize('delete', $myJob);

        // Retrieve all job applications for this job
        $applicants = $myJob->jobApplications;

        // Send email notifications to applicants
        foreach ($applicants as $application) {
            $applicant = $application->user;
            Mail::to($applicant->email)->send(new JobDeletedNotification($myJob, $applicant));
        }

        // Force delete the job
        $myJob->forceDelete();

        return redirect()->route('my-jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

}