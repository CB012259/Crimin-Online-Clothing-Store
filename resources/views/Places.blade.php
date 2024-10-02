
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
            <li><a href="/" class="{{ request()->is('/') ? 'underline font-bold' : 'hover:underline' }}">Home</a></li>
            <li><a href="/Customer-Support" class="{{ request()->is('Customer-Support') ? 'underline font-bold' : 'hover:underline' }}">Customer Support</a></li>
            <li><a href="/Size" class="{{ request()->is('Size') ? 'underline font-bold' : 'hover:underline' }}">Size Chart</a></li>
            <li><a href="/Promotions" class="{{ request()->is('Promotions') ? 'underline font-bold' : 'hover:underline' }}">Promotions</a></li>
            <li><a href="/Places" class="{{ request()->is('Places') ? 'underline font-bold' : 'hover:underline' }}">Places</a></li>
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
<div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Store Locations and Delivery Methods</h1>
        <p class="mb-6">
            Welcome to our store locations page! Here, you can find information about our store locations and the various delivery methods we offer.
        </p>

        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Our Store Locations</h2>
        
        <div class="mb-8 bg-white p-4 rounded shadow">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Location 1: Main Street Store</h3>
            <p class="mb-2">This store is located at 123 Main Street. We offer in-store shopping and local delivery.</p>
            <div class="mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.1721187796194!2d-122.08385468505666!3d37.42199917982543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba11aaef7e29%3A0xb5ed54d79c917d7b!2s123%20Main%20St!5e0!3m2!1sen!2sus!4v1630245613798!5m2!1sen!2sus" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"></iframe>
            </div>
             </div>

        <div class="mb-8 bg-white p-4 rounded shadow">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Location 2: Elm Street Store</h3>
            <p class="mb-2">This store is located at 456 Elm Street. We offer curbside pickup and same-day delivery.</p>
            <div class="mb-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.6765077846695!2d-122.424113584681!3d37.77492977975692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085818f33d1a5ff%3A0x5ec0e56f1b9c25ee!2s456%20Elm%20St!5e0!3m2!1sen!2sus!4v1630245629383!5m2!1sen!2sus" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="w-full"></iframe>
            </div>
             </div>

        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Delivery Methods</h2>
        <p class="mb-4">
            We offer several delivery methods to ensure that you receive your orders conveniently. Our options include:
        </p>
        <ul class="list-disc pl-6 mb-4">
            <li>Standard Delivery (3-5 business days)</li>
            <li>Express Delivery (1-2 business days)</li>
            <li>Curbside Pickup</li>
            <li>Same-Day Delivery (available in select areas)</li>
        </ul>
    </div>


</body>

