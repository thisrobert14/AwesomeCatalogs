<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')


    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">

<div class="min-h-full flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-700">
            Create an account
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
            Or
            <a href="{{ route('authentication.login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                Log in
            </a>
            if you already have one
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <div class="space-y-6">
                @if (session('register_error'))
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    {{ session('register_error') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <label for="firstName" class="block text-sm font-medium text-gray-700">
                        Your First name
                    </label>
                    <x-input type="text" id="first_name"
                        class="block mt-1 w-full" wire:keydown.enter="register"
                        wire:model.defer="firstName"
                    />
                    <x-input-error class="mt-1" for="firstName" />
                </div>
                <div>
                    <label for="lastName" class="block text-sm font-medium text-gray-700">
                        Your Last name
                    </label>
                    <x-input type="text" id="last_name"
                        class="block mt-1 w-full" wire:keydown.enter="register"
                        wire:model.defer="lastName"
                    />
                    <x-input-error class="mt-1" for="lastName" />
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <x-input type="text" id="email"
                        class="block mt-1 w-full" wire:keydown.enter="register"
                        wire:model.defer="email"
                    />
                    <x-input-error class="mt-1" for="email" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <x-input type="password" id="password"
                        class="block mt-1 w-full" wire:keydown.enter="register"
                        wire:model.defer="password"
                    />
                    <x-input-error class="mt-1" for="password" />
                </div>

                <div>
                    <x-buttons.primary wire:click="register" class="w-full">Create account</x-buttons.primary>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
</body>

</html>