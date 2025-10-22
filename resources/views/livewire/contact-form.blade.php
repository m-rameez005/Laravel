<div class="max-w-md mx-auto p-4 bg-white shadow-md rounded">
    <div class="px-6 py-4">
        @if(session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
        <p class="mb-4">We would love to hear from you! Please fill out the form below.</p>
        <form wire:submit.prevent="submit" method="POST">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" wire:model="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" wire:model="email" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" wire:model="message" required></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</div>
