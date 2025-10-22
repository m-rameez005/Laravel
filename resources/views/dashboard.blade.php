<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email" required>
            <br>
            <label for="message">Message:</label>
            <textarea id="message" wire:model="message" required></textarea>
            <br>
            <button type="submit">Send</button>
        </form>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
