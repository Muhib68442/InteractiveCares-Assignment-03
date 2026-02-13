<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col lg:flex-row min-h-screen">
        @include('layouts.sidebar')

        <main class="flex-1 p-6 lg:p-8">
            <!-- Topbar/Header inside Main Content -->
            @include('layouts.topbar')

            <!-- Session Notifications -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg animate-fadeIn">
                    <p class="text-sm font-medium">{{ session('success') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg animate-fadeIn">
                    <p class="text-sm font-medium">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>
</body>
</html>