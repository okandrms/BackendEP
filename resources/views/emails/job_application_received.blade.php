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
        <a href="https://www.syntrapxl.be/" class="mt-4 inline-block px-3 py-2 bg-gradient-to-r from-indigo-400 to-purple-500 text-white font-semibold rounded-full shadow-sm hover:bg-gradient-to-br hover:from-indigo-500 hover:to-purple-600 hover:text-gray-100 transition-transform transform-gpu hover:-translate-y-1 hover:shadow-lg">Learn More About Our Company</a>
        <p class="mt-6 text-gray-600">Best regards,</p>
        <p class="text-gray-600">{{ $company_name }}</p>
    </div>
</body>
</html>
