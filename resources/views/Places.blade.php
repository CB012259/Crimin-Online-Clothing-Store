
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Places</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<header class="bg-gray-900 text-white p-4">
    <nav>
        <ul class="flex justify-center space-x-6 m-4">
            <li><a href="/" class="hover:underline">Home</a></li>
            <li><a href='/Customer-Support' class="hover:underline">Customer Support</a></li>
            <li><a href="/Size" class="hover:underline">Size Chart</a></li>
            <li><a href="/Promotions" class="hover:underline">Promotions</a></li>

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



</body>

