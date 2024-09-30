
<head>
    <title>
        User Dashboard
    </title>
    
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Page') }}
        </h2>
        <br>
        <a href="{{ route('cart') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                            View Cart
                        </a>
    </x-slot>

    
</x-app-layout>
