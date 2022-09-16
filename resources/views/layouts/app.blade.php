<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

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
  @livewire('layouts.sidebar')
  @livewire('layouts.navbar')
  <main class="flex-1">
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-gray-900"></h1>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        @yield('content')
        <!-- /End replace -->
      </div>
    </div>
  </main>
  </div>
  </div>
  <x-notifications.toaster />

@if (session()->has('notify'))
    <script>
        window.onload = function() {
            window.dispatchEvent(new CustomEvent('notify', {
                detail: {
                    type: "{{ session('notify')['type'] }}",
                    message: "{!! session('notify')['message'] !!}",
                }
            }));
        }
    </script>
@endif

  @livewireScripts
</body>

</html>