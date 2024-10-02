<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Complete Payment</h1>
        
        <form action="{{ route('purchase.store') }}" method="POST" id="payment-form" class="space-y-4">
            @csrf
            <div class="text-center">
                        <input type="number" name="amount" id="amount" min="0.01" step="0.01" required>
                        <p class="text-lg font-semibold text-gray-700">Amount: <span class="font-bold" id="netAmountDisplay">{{ $netAmount }}</span></p>
       
                <p class="text-lg text-gray-600">Quantity: <span class="font-bold"> {{ $quantity }}</span></p>
            </div>

            <div>
                <label for="card-element" class="block text-sm font-medium text-gray-700">Credit or Debit Card</label>
                <div id="card-element" class="mt-2 p-3 border border-gray-300 rounded-md shadow-sm"></div>
                <div id="card-errors" class="text-red-500 mt-2 text-sm" role="alert"></div>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Card Holder Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-3 w-full border border-black rounded-md shadow-sm focus:ring-black focus:border-black" placeholder="Enter name">
            </div>

            <button type="submit" class="w-full bg-black text-white font-bold py-3 px-4 rounded-md hover:bg-black focus:outline-none focus:ring-black focus:ring-black focus:ring-opacity-50">Submit Payment</button>
        </form>
    </div>

    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        });
        document.getElementById('amount').value = {{ $netAmount }};
    </script>
</body>
</html>
