<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;

class ChartController extends Controller
{
    public function show($id)
    {
        $job = Job::find($id);
        $category = $job->category;
        $experience = $job->experience;

        return view('chart', compact('category', 'experience'));
    }

    public function getJobs(Request $request)
    {
        $category = $request->query('category');
        $experience = $request->query('experience');

        $jobs = Job::where('category', $category)
                    ->where('experience', $experience)
                    ->get(['title', 'salary']);

        return response()->json($jobs);
    }
}
