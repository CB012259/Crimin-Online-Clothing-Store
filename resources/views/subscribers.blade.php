<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Subscribers</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Subscribed At</th>
                </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $subscriber)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $subscriber->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $subscriber->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $subscriber->created_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br><a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>

    </div>
</body>
</html>