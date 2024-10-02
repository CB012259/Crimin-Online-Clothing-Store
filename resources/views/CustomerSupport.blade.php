<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support</title>
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
<main class="p-9">
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center text-black">Contact Information</h1>
        
        <div class="mb-4">
            <h3 class="text-xl font-semibold">Email Address:</h3>
            <p class="text-lg"><a href="mailto:crimin@business.com" class="text-black hover:underline">crimin@business.com</a></p>
        </div>

        <div class="mb-4">
            <h3 class="text-xl font-semibold">Phone Number:</h3>
            <p class="text-lg"><a href="tel:+1234567890" class="text-black hover:underline">+123-456-7890</a></p>
        </div>

        <div class="chat-container">
        <h3 class="text-xl font-semibold">Chat with Us...</h3> 
    <div class="chatbox" id="chatbox">
        <!-- Chat messages will be appended here -->
    </div>

    <div class="input-container">
    <input type="text" id="userInput" placeholder="Type your message here...Say Hello" style="width: 100%; max-width: 400px;" />
    <button onclick="sendMessage()">Send</button>
</div>
</div>
    </div>
</main>
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-center text-black mb-8">Ask Us Anything</h1>
    
    <form method="POST" action="{{ route('questions.store') }}">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Your Email:</label>
            <input type="email" id="email" name="email" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Your email address" required>
        </div>
        <div class="mb-4">
            <label for="question" class="block text-sm font-medium text-gray-700">Your Question:</label>
            <textarea id="question" name="question" rows="4" class="mt-1 block w-full text-black py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ask us anything..."></textarea>
        </div>
        <div class="flex items-end">
            <button type="submit" class="mt-2 bg-black text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
        </div>
    </form>
</div>
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center text-black mb-8">Returns and Exchanges</h1>
        
        <!-- Return Policy -->
        <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">Return Policy</h2>
        <p class="text-gray-600 mt-4">
            We want you to love what you ordered! If you're not fully satisfied with your purchase, we gladly accept returns within <strong>30 days</strong> of the delivery date.
        </p>
        <ul class="list-disc pl-6 mt-4 text-gray-600">
            <li>Items must be returned unworn, unwashed, and with original tags attached.</li>
            <li>Sale items, undergarments, and accessories are <strong>non-returnable</strong>.</li>
            <li>Return shipping costs are the responsibility of the customer unless the item was damaged or incorrect.</li>
        </ul>

        <!-- Exchange Policy -->
        <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mt-8">Exchange Policy</h2>
        <p class="text-gray-600 mt-4">
            If you need a different size or color, we offer exchanges for the same product within <strong>30 days</strong> of the delivery date.
        </p>
        <ul class="list-disc pl-6 mt-4 text-gray-600">
            <li>To be eligible for an exchange, the item must be in its original condition with tags attached.</li>
            <li>Exchanges are subject to availability, and if the desired item is unavailable, we will process it as a return.</li>
            <li>The customer is responsible for any shipping costs associated with the exchange unless we made an error.</li>
        </ul>

        <!-- Refund Process -->
        <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mt-8">Refund Process</h2>
        <p class="text-gray-600 mt-4">
            Once we receive and inspect your return, you will receive an email notification confirming receipt of the item.
        </p>
        <ul class="list-disc pl-6 mt-4 text-gray-600">
            <li><strong>Processing Time:</strong> Refunds are processed within <strong>5-7 business days</strong> after the returned item is received and approved.</li>
            <li>The refund will be issued to the <strong>original payment method</strong> (credit card, PayPal, etc.).</li>
            <li>Please note that shipping costs are <strong>non-refundable</strong>.</li>
        </ul>

        <!-- Exceptions -->
        <h2 class="text-2xl font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 mt-8">Exceptions to Return/Exchange</h2>
        <ul class="list-disc pl-6 mt-4 text-gray-600">
            <li>Items marked as <strong>final sale</strong> cannot be returned or exchanged.</li>
            <li>We do not accept returns for <strong>customized</strong> or <strong>personalized</strong> items.</li>
        </ul>
    </div>
<script>
    // Function to send user message
    function sendMessage() {
        var userInput = document.getElementById("userInput").value;
        if (userInput.trim() !== "") {
            appendMessage("user", userInput);
            getBotResponse(userInput);
        }
        document.getElementById("userInput").value = "";  // Clear the input field
    }

    // Function to append user or bot messages to chatbox
    function appendMessage(sender, message) {
        var chatbox = document.getElementById("chatbox");
        var newMessage = document.createElement("div");
        newMessage.classList.add("message");

        if (sender === "user") {
            newMessage.classList.add("user-message");
        } else {
            newMessage.classList.add("bot-message");
        }

        newMessage.textContent = message;
        chatbox.appendChild(newMessage);
        chatbox.scrollTop = chatbox.scrollHeight;  // Scroll to the bottom
    }

    // Simple bot responses
    function getBotResponse(userInput) {
        var botResponse = "";
        userInput = userInput.toLowerCase();

        if (userInput.includes("hello")) {
            botResponse = "Hello! How can I help you today?";
        } else if (userInput.includes("how are you")) {
            botResponse = "I'm a bot, but I'm doing great! Thanks for asking.";
        } else if (userInput.includes("what is your name")) {
            botResponse = "I'm your friendly chatbot!";
        } else if (userInput.includes("bye")) {
            botResponse = "Goodbye! Have a great day!";
        } else {
            botResponse = "I'm sorry, I don't understand that. Can you ask something else?";
        }

        setTimeout(function() {
            appendMessage("bot", botResponse);
        }, 500);  // Simulate a typing delay
    }

    // Allow sending messages using "Enter" key
    document.getElementById("userInput").addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            sendMessage();
        }
    });
</script>
</body>


