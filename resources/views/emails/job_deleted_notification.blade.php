<!DOCTYPE html>
<html>
<head>
    <title>Job unavailable</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Job application unavailable</h1>
        <p class="mt-4 text-gray-600">Hello {{ $applicant->name }},</p>
        <p class="mt-2 text-gray-600">We regret to inform you that the job "{{ $job->title }}" from "{{ $company_name }}" that you applied for is no longer available.</p>
        <p class="mt-2 text-gray-600">Hopefully you will find another job that meets your qualifications.</p>
        <p class="mt-2 text-gray-600">If you have any questions or concerns, please don't hesitate to contact us.</p>
        <p class="mt-2 text-gray-600">click on the button below to view all available jobs on our website.</p>
        <a href="{{ route('jobs.index') }}" class="mt-4 inline-block px-3 py-2 bg-gradient-to-r from-indigo-400 to-purple-500 text-white font-semibold rounded-full shadow-sm hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:text-gray-100 transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">View Available Jobs</a>
        <p class="mt-6 text-gray-600">Best regards,</p>
        <p class="text-gray-600">Job Factory</p>
        
        
        

    </div>
</body>
</html>

