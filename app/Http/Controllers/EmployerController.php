<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }

    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        auth()->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|min:3|unique:employers,company_name'
            ])
        );

        return redirect('http://127.0.0.1:8000/my-jobs')
            ->with('success', 'Your employer account was created!');
    }
}
