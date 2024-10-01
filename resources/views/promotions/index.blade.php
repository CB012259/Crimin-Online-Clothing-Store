<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<main class="p-6 bg-white max-w-4xl mx-auto shadow-lg rounded-lg">
    <!-- Gallery Section -->
    <section id="gallery" class="mt-8">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Gallery</h3>
        <div class="relative">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        
                        <th class="py-2 px-4 border-b">Image</th>
                        <th class="py-2 px-4 border-b">Uploaded At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promotions as $promotion)
                        <tr>
                            <td class="py-2 px-4 border-b">
                                <img src="{{ asset('storage/' . $promotion->image_path) }}" alt="Promotion {{ $promotion->id }}" class="w-32 h-auto rounded-lg">
                            </td>
                            <td class="py-2 px-4 border-b">{{ $promotion->created_at }}</td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <a href="{{ route('promotions.create') }}" class="inline-block px-4 py-2 bg-black text-white font-semibold text-sm rounded-lg shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-opacity-75">
        Manage Promotions
    </a>
    <button onclick="history.back()" class="inline-block px-4 py-2 bg-black text-white font-semibold text-sm rounded-lg shadow-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-opacity-75">Back</button>

</main>