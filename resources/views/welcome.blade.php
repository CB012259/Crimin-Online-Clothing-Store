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
        document.addEventListener('DOMContentLoaded', function() {
            const categoryFilter = document.getElementById('category');
            const priceFilter = document.getElementById('price');

            categoryFilter.addEventListener('change', filterProducts);
            priceFilter.addEventListener('change', filterProducts);

            function filterProducts() {
                const category = categoryFilter.value;
                const priceRange = priceFilter.value;

                const products = document.querySelectorAll('#product-listings ul li');
                products.forEach(product => {
                    const productCategory = product.closest('div').id; // e.g., 't-shirts', 'bottoms'
                    const productPrice = parseInt(product.dataset.price); // Assuming you add data-price attribute to each product item

                    let categoryMatch = category === 'all' || productCategory === category;
                    let priceMatch = false;

                    switch (priceRange) {
                        case 'all':
                            priceMatch = true;
                            break;
                        case '0-25':
                            priceMatch = productPrice <= 25;
                            break;
                        case '25-50':
                            priceMatch = productPrice > 25 && productPrice <= 50;
                            break;
                        case '50-100':
                            priceMatch = productPrice > 50 && productPrice <= 100;
                            break;
                        case '100-200':
                            priceMatch = productPrice > 100 && productPrice <= 200;
                            break;
                        case '200':
                            priceMatch = productPrice > 200;
                            break;
                    }

                    if (categoryMatch && priceMatch) {
                        product.style.display = '';
                    } else {
                        product.style.display = 'none';
                    }
                });
            }

            // Initialize Slick Carousel
            let currentIndex = 0;

            function showSlide(index) {
                const slides = document.querySelectorAll('.carousel-item');
                if (index >= slides.length) {
                    currentIndex = 0;
                } else if (index < 0) {
                    currentIndex = slides.length - 1;
                } else {
                    currentIndex = index;
                }
                const offset = -currentIndex * 100;
                document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
            }

            function nextSlide() {
                showSlide(currentIndex + 1);
            }

            function prevSlide() {
                showSlide(currentIndex - 1);
            }

            // Auto-slide
            setInterval(nextSlide, 3000);
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
<header class="bg-amber-200 text-black p-4">

    <nav class="flex justify-between items-center py-4 px-6  text-white">
        <div class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-30 h-20 object-contain" />

            <ul class="flex ml-6 text-black space-x-6" >
                <li><a href="#t-shirts" class="hover:underline">T-shirts</a></li>
                <li><a href="#bottoms" class="hover:underline">Bottoms</a></li>
                <li><a href="#accessories" class="hover:underline">Accessories</a></li>
                <li><a href="/Customer-Support" class="hover:underline">Customer Support</a></li>
                <li><a href="/Promotions" class="hover:underline">Promotions</a></li>
                <li><a href="/Places" class="hover:underline">Places</a></li>
            </ul>
        </div>

        <div class="login-menu">
            @if (Route::has('login'))
                <div class="flex items-center">
                    @auth
                        @if(Auth::user()->role == 'user')
                            <a href="{{ url('dashboard') }}" class="text-black hover:text-white hover:bg-black px-3 py-2 rounded-md transition duration-300">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                USER
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
        <section id="filters" class="mb-10 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Filter Products</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="t-shirts">T-shirts</option>
                        <option value="bottoms">Bottoms</option>
                        <option value="accessories">Accessories</option>
                    </select>
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price Range</label>
                    <select id="price" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="0-25">$0 - $25</option>
                        <option value="25-50">$25 - $50</option>
                        <option value="50-100">$50 - $100</option>
                        <option value="100-200">$100 - $200</option>
                        <option value="200">$200+</option>
                    </select>
                </div>
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                    <select id="color" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                    </select>
                </div>
                <div>
                    <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                    <select id="size" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                    </select>
                </div>
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unisex">Unisex</option>
                    </select>
                </div>
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700">Brand</label>
                    <select id="brand" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="brand1">Brand 1</option>
                        <option value="brand2">Brand 2</option>
                        <option value="brand3">Brand 3</option>
                    </select>
                </div>
                <div>
                    <label for="material" class="block text-sm font-medium text-gray-700">Material</label>
                    <select id="material" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="all">All</option>
                        <option value="cotton">Cotton</option>
                        <option value="wool">Wool</option>
                        <option value="polyester">Polyester</option>
                        <option value="leather">Leather</option>
                    </select>
                </div>
            </div>
        </section>  <!-- Existing Product Listings Section -->
    </main>

</header>

<main class="p-6">
    <section id="product-listings" class="mb-10">
        <h2 class="text-2xl font-bold border-b-2 border-gray-900 pb-2 mb-4">Product Listings</h2>

        <div id="t-shirts" class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h3 class="text-xl font-semibold mb-2">T-shirts</h3>
            <p class="mb-4">Shirts, Sweaters, Jackets</p>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <li class="flex items-center space-x-4" data-category="t-shirts" data-price="25-50" data-color="white" data-size="m" data-gender="unisex" data-brand="brand1" data-material="cotton">
                    <img src="https://th.bing.com/th/id/OIG4.8s3DolygY7brMEJiLmWt?pid=ImgGn" alt="Classic T-shirt" class="w-20 h-20 rounded-lg">
                    <span>Classic T-shirt</span>
                </li>
                <li class="flex items-center space-x-4" data-category="t-shirts" data-price="25-50" data-color="black" data-size="l" data-gender="male" data-brand="brand2" data-material="polyester">
                    <img src="https://th.bing.com/th/id/OIG2.O_JTNbcNprOeIEeYEtVm?pid=ImgGn" alt="Graphic Tee" class="w-20 h-20 rounded-lg">
                    <span>Graphic Tee</span>
                </li>


                <li class="flex items-center space-x-4" data-category="t-shirts" data-price="0-25" data-color="blue" data-size="m" data-gender="unisex" data-brand="brand1" data-material="cotton">
                    <img src="https://th.bing.com/th/id/OIG3.2y4KkweVDoChoq.sPRBA?pid=ImgGn" alt="Tank Top" class="w-20 h-20 rounded-lg">
                    <span>Tank Top</span>
                </li>
            </ul>
        </div>

        <div id="bottoms" class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h3 class="text-xl font-semibold mb-2">Bottoms</h3>
            <p class="mb-4">Pants, Shorts, Skirts, Dresses</p>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <li class="flex items-center space-x-4" data-category="bottoms" data-price="50-100" data-color="blue" data-size="m" data-gender="unisex" data-brand="brand1" data-material="denim">
                    <img src="https://th.bing.com/th/id/OIG3.LNsRDsO62HiEiwLVKOn3?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="Jeans" class="w-20 h-20 rounded-lg">
                    <span>Jeans</span>
                </li>
                <li class="flex items-center space-x-4" data-category="bottoms" data-price="25-50" data-color="khaki" data-size="l" data-gender="male" data-brand="brand2" data-material="cotton">
                    <img src="https://th.bing.com/th/id/OIG2.PKRkAUXNyUZfzjMO6d1h?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="Chino Pants" class="w-20 h-20 rounded-lg">
                    <span>Chino Pants</span>
                </li>
                <li class="flex items-center space-x-4" data-category="bottoms" data-price="25-50" data-color="green" data-size="xl" data-gender="male" data-brand="brand3" data-material="cotton">
                    <img src="https://th.bing.com/th/id/OIG2.OfysDeXHER2Mr5xAMDn1?pid=ImgGn" alt="Cargo Shorts" class="w-20 h-20 rounded-lg">
                    <span>Cargo Shorts</span>
                </li>


            </ul>
        </div>

        <div id="accessories" class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h3 class="text-xl font-semibold mb-2">Accessories</h3>
            <p class="mb-4">Bags, Hats, Belts, Scarves</p>
            <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <li class="flex items-center space-x-4" data-category="accessories" data-price="50-100" data-color="black" data-gender="unisex" data-brand="brand1" data-material="leather">
                    <img src="https://th.bing.com/th/id/OIG2.uzVgPk7MaRq11P3ymt4b?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="Leather Belt" class="w-20 h-20 rounded-lg">
                    <span>Leather Belt</span>
                </li>
                <li class="flex items-center space-x-4" data-category="accessories" data-price="25-50" data-color="blue" data-gender="unisex" data-brand="brand2" data-material="cotton">
                    <img src="https://th.bing.com/th/id/OIG3.wc4bcNzR7ExjU5CLDU2a?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="Baseball Cap" class="w-20 h-20 rounded-lg">
                    <span>Baseball Cap</span>
                </li>
                <li class="flex items-center space-x-4" data-category="accessories" data-price="25-50" data-color="red" data-gender="unisex" data-brand="brand3" data-material="wool">
                    <img src="https://th.bing.com/th/id/OIG4.yWqR41OyjP3sV9T.gqRU?w=1024&h=1024&rs=1&pid=ImgDetMain" alt="Beanie" class="w-20 h-20 rounded-lg">
                    <span>Beanie</span>
                </li>


            </ul>
        </div>


    </section>




</main>

<footer class="bg-gray-900 text-white text-center p-4">
    <p>&copy;Crimin All rights reserved.</p>
</footer>

<script src="script.js"></script>
</body>
</html>
