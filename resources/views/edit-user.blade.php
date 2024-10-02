<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-xl font-semibold mb-6">Edit User</div>

            @if (Session::has('fail'))
            <span class="bg-red-500 text-white p-2 block mb-4 rounded">{{ Session::get('fail') }}</span>
            @endif

            <div class="card-body">
                <form action="{{ route('EditUser') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-input mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-gray-300 focus:border-gray-500" placeholder="Enter Full Name">
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-input mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-gray-300 focus:border-gray-500" placeholder="Enter Email">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                        <input type="number" name="phone_number" value="{{ $user->phone_number }}" class="form-input mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-gray-300 focus:border-gray-500" placeholder="Enter Phone Number">
                        @error('phone_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-black text-white py-2 px-4 rounded hover:bg-gray-700">Save</button>
                </form><br>
            </div>

            <button onclick="history.back()" class="bg-black text-white py-2 px-4 rounded hover:bg-gray-700">Back</button>
        </div>
    </div>
</body>

</html>
