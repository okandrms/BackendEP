<!DOCTYPE html>
<html>
<head>
    <title>Job Application Received</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-lg mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Job Application Received</h1>
        <p class="mt-4 text-gray-600">Dear {{ $user->name }},</p>
        <p class="mt-2 text-gray-600">Thank you for applying for a job at {{ $company_name }}. We have received your application and will review it shortly.</p>
        <a href="http://your-company-url.com" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Learn More About Our Company</a>
        <p class="mt-6 text-gray-600">Best regards,</p>
        <p class="text-gray-600">{{ $company_name }}</p>
    </div>
</body>
</html>
