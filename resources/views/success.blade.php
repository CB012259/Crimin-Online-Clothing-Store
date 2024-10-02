<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg text-center">
        <h1 class="text-2xl font-bold mb-4">Success</h1>
        <p class="mb-6">Your payment was successful!</p>
        <a href="{{ url('/') }}" class="bg-black hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Go to Home Page
        </a>
    </div>
</body>
</html>