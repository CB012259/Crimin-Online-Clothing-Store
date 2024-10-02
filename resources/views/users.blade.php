<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Table</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    {{-- here we will pass list of all users --}}
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-xl font-semibold mb-6 flex justify-between">
                <span>CRIMIN USERS</span>
                <a href="/add/user" class="bg-black text-white py-2 px-4 rounded hover:bg-gray-700 text-sm">Add New</a>
            </div>

            @if (Session::has('success'))
            <span class="bg-green-500 text-white p-2 block mb-4 rounded">{{ Session::get('success') }}</span>
            @endif

            @if (Session::has('fail'))
            <span class="bg-red-500 text-white p-2 block mb-4 rounded">{{ Session::get('fail') }}</span>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="text-left py-3 px-4">S/N</th>
                            <th class="text-left py-3 px-4">Full Name</th>
                            <th class="text-left py-3 px-4">Email</th>
                            <th class="text-left py-3 px-4">Phone Number</th>
                            <th class="text-left py-3 px-4">Registration Date</th>
                            <th class="text-left py-3 px-4">Last Update</th>
                            <th class="text-left py-3 px-4" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($all_users) > 0)
                        @foreach ($all_users as $item)
                        <tr class="border-b">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $item->name }}</td>
                            <td class="py-3 px-4">{{ $item->email }}</td>
                            <td class="py-3 px-4">{{ $item->phone_number }}</td>
                            <td class="py-3 px-4">{{ $item->created_at }}</td>
                            <td class="py-3 px-4">{{ $item->updated_at }}</td>
                            <td class="py-3 px-4">
                                <a href="/edit/{{$item->id}}" class="bg-black text-white py-2 px-4 rounded hover:bg-gray-700 text-sm">Edit</a>
                            </td>
                            <td class="py-3 px-4">
                                <a href="/delete/{{$item->id}}" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 text-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="8" class="text-center py-4">No User Found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> <br>
        <button onclick="history.back()" class="bg-black text-white py-2 px-4 rounded hover:bg-gray-700">Back</button>
    </div>
</body>

</html>
