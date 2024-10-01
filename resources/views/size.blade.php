<head>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>
        Size Chart
    </title>
</head>
<header class="bg-gray-900 text-white p-4">
    <nav>
        <ul class="flex justify-center space-x-6 m-4">
            <li><a href="/" class="hover:underline">Home</a></li>
            <li><a href='/Customer-Support' class="hover:underline">Customer Support</a></li>
            <li><a href="/Promotions" class="hover:underline">Promotions</a></li>
            <li><a href="/Size" class="hover:underline">Size Chart</a></li>
            <li><a href="/Places" class="hover:underline">Places</a></li>
        </ul>
        <div class="login_menu">
            <ul>
                <li>
                    @if (Route::has('login'))
                        <nav class="-mx-1 flex flex-1 justify-end">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    USER
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-yellow-400/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </li>
            </ul>
        </div>

    </nav>
    <span></span>


</header>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Size Chart') }}
        </h2>
    </x-slot>

<section>
  <div class="flex justify-center items-center min-h-screen py-8 px-5">
        <div class="grid grid-cols-2 gap-8">
            <div class="space-y-8">
                <div>
                    <h2 class="text-3xl font-semibold mb-4">Size Chart</h2>
                    <h2 class="text-2xl font-semibold mb-4">Men's Top Measurements</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200">SIZE</th>
                            <th class="py-2 px-4 bg-gray-200">BUST GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">NECK GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">SLEEVE</th>
                            <th class="py-2 px-4 bg-gray-200">WAIST GIRTH</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">SMALL</td>
                            <td class="py-2 px-4">36-38"</td>
                            <td class="py-2 px-4">14.5-15"</td>
                            <td class="py-2 px-4">33-34"</td>
                            <td class="py-2 px-4">30"</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">MEDIUM</td>
                            <td class="py-2 px-4">39-41"</td>
                            <td class="py-2 px-4">15.5-16"</td>
                            <td class="py-2 px-4">34-35"</td>
                            <td class="py-2 px-4">32-34"</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">LARGE</td>
                            <td class="py-2 px-4">42-44"</td>
                            <td class="py-2 px-4">16.5-17"</td>
                            <td class="py-2 px-4">35-36"</td>
                            <td class="py-2 px-4">36-38"</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">X-LARGE</td>
                            <td class="py-2 px-4">45-47"</td>
                            <td class="py-2 px-4">17.5-18"</td>
                            <td class="py-2 px-4">36-37"</td>
                            <td class="py-2 px-4">40-42"</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">XX-LARGE</td>
                            <td class="py-2 px-4">48-50"</td>
                            <td class="py-2 px-4">18.5-19"</td>
                            <td class="py-2 px-4">37-37.5"</td>
                            <td class="py-2 px-4">44"</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">3X-LARGE</td>
                            <td class="py-2 px-4">51-53"</td>
                            <td class="py-2 px-4">19.5-20"</td>
                            <td class="py-2 px-4">37-37.5"</td>
                            <td class="py-2 px-4">46-48"</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Men's Bottom Measurements</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200">SIZE</th>
                            <th class="py-2 px-4 bg-gray-200">WAIST GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">INSEAM</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">SMALL</td>
                            <td class="py-2 px-4">30"</td>
                            <td class="py-2 px-4">34"</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">MEDIUM</td>
                            <td class="py-2 px-4">32-34"</td>
                            <td class="py-2 px-4">34"</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">LARGE</td>
                            <td class="py-2 px-4">36-38"</td>
                            <td class="py-2 px-4">34"</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">X-LARGE</td>
                            <td class="py-2 px-4">40-42"</td>
                            <td class="py-2 px-4">34"</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">XX-LARGE</td>
                            <td class="py-2 px-4">44"</td>
                            <td class="py-2 px-4">34"</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="space-y-8">
                <div>
                    <h2 class="text-2xl font-semibold mb-4">Women's Top Measurements</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200">SIZE</th>
                            <th class="py-2 px-4 bg-gray-200">BUST GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">WAIST GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">HIPS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">8/S</td>
                            <td class="py-2 px-4">34”</td>
                            <td class="py-2 px-4">28”</td>
                            <td class="py-2 px-4">36”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">10/M</td>
                            <td class="py-2 px-4">36”</td>
                            <td class="py-2 px-4">30”</td>
                            <td class="py-2 px-4">38”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">12/L</td>
                            <td class="py-2 px-4">38”</td>
                            <td class="py-2 px-4">32”</td>
                            <td class="py-2 px-4">40”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">14/XL</td>
                            <td class="py-2 px-4">40”</td>
                            <td class="py-2 px-4">34”</td>
                            <td class="py-2 px-4">42”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">16/XXL</td>
                            <td class="py-2 px-4">42”</td>
                            <td class="py-2 px-4">36”</td>
                            <td class="py-2 px-4">44”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">18/3XL</td>
                            <td class="py-2 px-4">44”</td>
                            <td class="py-2 px-4">38”</td>
                            <td class="py-2 px-4">46”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">20/4XL</td>
                            <td class="py-2 px-4">46”</td>
                            <td class="py-2 px-4">40”</td>
                            <td class="py-2 px-4">48”</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold mb-4">Women's Bottom Measurements</h2>
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200">SIZE</th>
                            <th class="py-2 px-4 bg-gray-200">WAIST GIRTH</th>
                            <th class="py-2 px-4 bg-gray-200">INSEAM</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">8/S</td>
                            <td class="py-2 px-4">28”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">10/M</td>
                            <td class="py-2 px-4">30”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">12/L</td>
                            <td class="py-2 px-4">32”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">14/XL</td>
                            <td class="py-2 px-4">34”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">16/XXL</td>
                            <td class="py-2 px-4">36”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-white">
                            <td class="py-2 px-4">18/3XL</td>
                            <td class="py-2 px-4">38”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="py-2 px-4">20/4XL</td>
                            <td class="py-2 px-4">40”</td>
                            <td class="py-2 px-4">34”</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

