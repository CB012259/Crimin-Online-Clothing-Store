<head>
    <title>
        ADMIN Dashboard
    </title>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Admin Functions</h1>
                    <!-- Adding a Tailwind CSS styled link to /users route -->
                    <a href="{{ url('/users') }}" class="inline-block px-4 py-2 bg-blue-500 text-black font-semibold text-sm rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Add Users
                    </a>
                    <a href="{{ url('/products') }}" class="inline-block px-4 py-2 bg-blue-500 text-black font-semibold text-sm rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                        Add products
                    </a>
                    <a href="{{ route('admin.questions') }}" class="inline-block px-4 py-2 bg-blue-500 text-black font-semibold text-sm rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    View Questions from All Users
                    </a>
                    <a href="{{ route('admin.reviews.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-black font-semibold text-sm rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Manage Reviews
                </a>
                </div>
            </div>
        </div>
    </div>
    <!-- resources/views/admin/add_admin.blade.php -->
</x-app-layout>







