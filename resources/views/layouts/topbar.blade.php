<header class="bg-white shadow-sm rounded-xl mb-8">
    <div class="px-6 py-4 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>
            <p class="text-sm text-gray-500">@yield('page_subtitle', 'Welcome back, ' . session('user_name'))</p>
        </div>

        <div class="flex items-center space-x-4">
            <!-- User Info (Desktop) -->
            <div class="hidden md:flex items-center space-x-3 border-l pl-4 border-gray-100">
                <div class="text-right">
                    <p class="text-sm font-semibold text-gray-800">{{ session('user_name') }}</p>
                    <p class="text-xs text-gray-500">{{ session('user_email') }}</p>
                </div>
                <div
                    class="w-10 h-10 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-sm">
                    {{ session('user_name') ? session('user_name')[0] : 'U' }}
                </div>
                <a href="{{ route('logout') }}" 
                   class="p-2 text-gray-400 hover:text-red-500 transition-colors"
                   title="Logout">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </a>
            </div>
            
            <!-- Mobile Logout Only -->
            <div class="md:hidden">
                <a href="{{ route('logout') }}" 
                   class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</header>