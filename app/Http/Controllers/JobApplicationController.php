<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Mail\JobApplicationReceived;
use Illuminate\Support\Facades\Mail;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        $this->authorize('apply', $job);
        return view('job_application.create', ['job'=>$job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
{
    // Ensure user is authorized to apply for this job
    $this->authorize('apply', $job);

    // Validate incoming request data
    $validatedData = $request->validate([
        'expected_salary' => 'required|numeric|min:1|max:1000000',
        'cv' => 'required|file|mimes:pdf|max:2048'
    ]);

    // Get authenticated user
    $user = auth()->user();

    // Get the employer associated with the job
    $employer = $job->employer;
    $company_name = $employer->company_name;

    // Store the CV file in a private storage with the original file name
    $file = $request->file('cv');
    $originalFileName = $file->getClientOriginalName();
    $path = $file->storeAs('cvs', $originalFileName, 'private');

    // Create a new job application record
    $job->jobApplications()->create([
        'user_id' => $user->id,
        'expected_salary' => $validatedData['expected_salary'],
        'cv_path' => $path
    ]);

    // Send email notification to user
    Mail::to($user->email)->send(new JobApplicationReceived($user, $employer, $company_name));

    // Redirect back to job details page with success message
    return redirect()->route('jobs.show', $job)
        ->with('success', 'Job application submitted.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadCv(JobApplication $application)
{
    $this->authorize('view', $application); // Ensure the user is authorized to view the application

    $filePath = storage_path('app/private/' . $application->cv_path);

    if (!file_exists($filePath)) {
        abort(404, 'CV not found.');
    }

    return response()->download($filePath);
}

}
