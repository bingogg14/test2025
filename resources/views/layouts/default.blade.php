<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    @include('layouts.partials.head')
</head>
<body class="h-full">
<div class="min-h-full">
    <x-navbar/>

    @yield('page-header')

    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        @yield('content')
    </main>
</div>
</body>
</html>
