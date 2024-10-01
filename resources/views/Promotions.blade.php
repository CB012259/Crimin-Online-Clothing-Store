<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
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
</header>
<main class="p-6 bg-white max-w-4xl mx-auto shadow-lg rounded-lg">
    <!-- Gallery Section -->
    <section id="gallery" class="mt-8 relative">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Gallery</h3>
        <div class="relative w-full h-64 overflow-hidden">
            @foreach($promotions as $promotion)
                <div class="gallery-item absolute inset-0 bg-gray-200 p-4 rounded-lg opacity-0 transition-opacity duration-500 ease-in-out {{ $loop->first ? 'opacity-100' : '' }}" id="gallery-item-{{ $loop->index }}">
                    <img src="{{ asset('storage/' . $promotion->image_path) }}" 
                         alt="Promotion {{ $loop->index + 1 }}" 
                         class="w-full h-full object-cover rounded-lg"
                    >
                </div>
            @endforeach
        </div>
        <!-- Next and Previous Buttons -->
        <button id="prevBtn" class="absolute top-1/2 left-0 transform -translate-y-1/2 p-2 bg-black text-white rounded-full">←</button>
        <button id="nextBtn" class="absolute top-1/2 right-0 transform -translate-y-1/2 p-2 bg-black text-white rounded-full">→</button>
    </section>

    <section id="email-marketing" class="mt-10">
        <!-- First Heading and Description -->
        <h3 class="text-xl font-semibold mb-2 text-gray-700">
            Special Offers and Promotions via Email
        </h3>
        <p class="text-gray-600 mb-6">
            Subscribe to receive targeted email campaigns with personalized discounts and promotions to increase conversion rates.
        </p>

        <!-- Newsletter Subscription Form -->
        <h3 class="text-xl font-semibold mb-2 text-gray-700">
            Newsletter Subscription
        </h3>
        <form action="{{ route('subscribe') }}" method="POST" class="flex flex-col sm:flex-row items-center gap-4 mb-6">
            @csrf
            <div class="relative w-full sm:flex-grow">
                <!-- Email Icon -->
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4-8v8m4-8a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </span>
                <!-- Email Input -->
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Your email" 
                    required 
                    class="p-3 pl-10 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-black focus:outline-none transition-shadow duration-200" 
                />
            </div>
            <!-- Subscribe Button -->
            <button 
                type="submit" 
                class="flex items-center p-3 bg-black text-white rounded-md hover:bg-gray-800 transition-colors duration-200"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
                Subscribe
            </button>
        </form>
    </section>
</main>





<script>
    let currentImageIndex = 0;
    const galleryItems = document.querySelectorAll('.gallery-item');
    const totalImages = galleryItems.length;

    // Function to show image based on index
    function showImage(index) {
        galleryItems.forEach((item, idx) => {
            if (idx === index) {
                item.classList.remove('opacity-0');
                item.classList.add('opacity-100');
            } else {
                item.classList.remove('opacity-100');
                item.classList.add('opacity-0');
            }
        });
    }

    // Next button functionality
    document.getElementById('nextBtn').addEventListener('click', () => {
        currentImageIndex = (currentImageIndex + 1) % totalImages;
        showImage(currentImageIndex);
    });

    // Previous button functionality
    document.getElementById('prevBtn').addEventListener('click', () => {
        currentImageIndex = (currentImageIndex - 1 + totalImages) % totalImages;
        showImage(currentImageIndex);
    });

    // Initial image display
    showImage(currentImageIndex);
</script>



</body>

