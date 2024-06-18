<!DOCTYPE html>
<html>
<head>
    <title>Job Application Received</title>
</head>
<body>
    <h1>Job Application Received</h1>
    <p>Dear {{ $user->name }},</p>
    <p>Thank you for applying for a job at {{ $company_name }}. We have received your application and will review it shortly.</p>
    <p>Best regards,</p>
    <p>{{ $company_name }}</p>
</body>
</html>
