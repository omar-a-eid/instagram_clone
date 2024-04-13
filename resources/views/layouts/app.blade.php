<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/userProfile.css'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-rc99w3XoBfS5PwKbIOWjFCcgo4xRTu/ZoS6Kvj2+Ew0=" crossorigin="anonymous"></script>


</head>

<body class="font-sans antialiased">

    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content items-center justify-center">
            <!-- Page content here -->
            {{ $slot }}
        </div>
        <div class="drawer-side overflow-visible z-10">
            <label for="my-drawer-2" class="drawer-overlay"></label>

            @include('layouts.sidebar')

        </div>
    </div>


    @livewire('wire-elements-modal')

</body>

</html>
