<!DOCTYPE html>
<html>
<head>
    <title>Job Posting Deleted</title>
</head>
<body>
    <h1>Job Posting Deleted</h1>
    <p>Dear {{ $applicant->name }},</p>
    <p>We regret to inform you that the job "{{ $job->title }}" is not available anymore.</p>
    <p>We apologize for any inconvenience this may cause.</p>
    <p>Best regards,</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
