<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimin</title>
    <style>
        .carousel {
            overflow: hidden;
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease-in-out;

        }
        .carousel-item {
            min-width: 100%;
            height: 350px;
            background-size: cover;
            background-position: top center;
            background-image: url("https://images.pexels.com/photos/3312030/pexels-photo-3312030.jpeg");
               }
    </style>
    <script>
        
        
    </script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body class="bg-gray-100 font-sans">
<header class="bg-amber-200 text-black p-4">

<nav class="bg-800 text-white py-4 px-6">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-16 object-contain" />
            <ul class="flex justify-center text-black space-x-6 m-4">
            <li><a href="/Customer-Support" class="{{ request()->is('Customer-Support') ? 'underline font-bold' : 'hover:underline' }}">Customer Support</a></li>
            <li><a href="/Size" class="{{ request()->is('Size') ? 'underline font-bold' : 'hover:underline' }}">Size Chart</a></li>
            <li><a href="/Promotions" class="{{ request()->is('Promotions') ? 'underline font-bold' : 'hover:underline' }}">Promotions</a></li>
            <li><a href="/Places" class="{{ request()->is('Places') ? 'underline font-bold' : 'hover:underline' }}">Places</a></li>
        </ul>
        </div>

        <!-- Toggle Button and Login Section -->
        <div class="flex items-center">
        

            <!-- Login Menu -->
            @if (Route::has('login'))
                <div class="flex items-center">
                    @auth
                        @if(Auth::user()->role == 'user')
                            <a href="{{ url('dashboard') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                USER
                            </a>
                            <a
                            href="{{ route('cart') }}"
                            class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300"
                        ><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            View Cart
                        </a>
                        @else
                            <a href="{{ url('/home') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                ADMIN
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

   
</nav>


    <span></span>

        <div class="carousel-inner flex">

            <div class="carousel-item bg-cover bg-center">
                <div class="text-white text-center py-20 px-4">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-shadow-bordered">Welcome to Crimin</h1>
                    <p class="text-xl md:text-2xl lg:text-3xl mt-4 text-shadow-bordered">Explore our latest collections and exclusive offers.</p>
                </div>
            </div>


        </div>


    <main class="p-6">
    <section id="product-listings" class="mb-10 bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Filter Products</h2>
        <!-- Search Bar -->
        <form method="GET" action="{{ route('products.search') }}" class="mb-6">
            <div class="flex items-center">
                <input type="text" name="search" placeholder="Search products..." class="w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-black focus:border-black sm:text-sm">
                <button type="submit" class="ml-2 px-4 py-2 bg-black text-white rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">Search</button>
            </div>
        </form>
        <form method="GET" action="{{ route('products.filter') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Filter by Category:</label>
                <select id="category" name="category" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">All</option>
                    <option value="t-shirts">T-shirts</option>
                    <option value="bottoms">Bottoms</option>
                    <option value="accessories">Accessories</option>
                </select>
            </div>
            <div>
                <label for="size" class="block text-sm font-medium text-gray-700">Filter by Size:</label>
                <select id="size" name="size" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">All</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                </select>
            </div>
            <div>
                <label for="color" class="block text-sm font-medium text-gray-700">Filter by Color:</label>
                <input type="text" id="color" name="color" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Filter by Gender:</label>
                <select id="gender" name="gender" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>
            <div>
                <label for="brand" class="block text-sm font-medium text-gray-700">Filter by Brand:</label>
                <input type="text" id="brand" name="brand" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="material" class="block text-sm font-medium text-gray-700">Filter by Material:</label>
                <input type="text" id="material" name="material" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Filter by Price:</label>
                <select id="price" name="price" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="all">All</option>
                    <option value="0-25">$0 - $25</option>
                    <option value="25-50">$25 - $50</option>
                    <option value="50-100">$50 - $100</option>
                    <option value="100-200">$100 - $200</option>
                    <option value="200">$200+</option>
                </select>
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="mt-2 bg-black text-white py-2 px-4 rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500">Filter</button>
            </div>
        </form>
    </section>
    </main>
        
</header>

<main class="p-6">
<section id="products" class="p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <a href="{{ route('products.show', $product->id) }}" class="bg-white p-4 rounded-lg shadow-md block">
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $product->image_url) }}" class="w-48 h-60 md:w-64 md:h-64 lg:w-80 lg:h-80 object-contain rounded-t-lg">
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="text-gray-900 font-bold">${{ $product->price }}</p>
                </div>
            </a>
        @endforeach
    </div>
</section>
</main>

<footer class="bg-gray-900 text-white text-center p-4">
    <p>&copy;Crimin All rights reserved.</p>
</footer>

<script src="script.js"></script>
</body>
</html>
