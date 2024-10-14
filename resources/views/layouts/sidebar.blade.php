<nav x-data="{ open: false }" class="flex h-screen bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 fixed">
    <!-- Sidebar -->
    <div class="flex flex-col w-16 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-width duration-300 h-full">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>

        <!-- Navigation Links -->
        <div class="flex-1 flex flex-col justify-center">
            <ul class="flex flex-col items-center space-y-4 mt-4">
                <li class="group">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center justify-center p-2 rounded-md transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" d="M3 3h18v18H3V3z" />
                        </svg>
                        <span class="hidden ml-2 text-gray-800 dark:text-gray-200 group-hover:block"> {{ __('Dashboard') }}</span>
                    </x-nav-link>
                </li>

                <li class="group">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('another.route')" class="flex items-center justify-center p-2 rounded-md transition-colors duration-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6 text-gray-800 dark:text-gray-200" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" d="M6 3v18l15-9L6 3z" />
                        </svg>
                        <span class="hidden ml-2 text-gray-800 dark:text-gray-200 group-hover:block"> {{ __('Another Route') }}</span>
                    </x-nav-link>
                </li>

                <!-- Add more links here as needed -->
            </ul>
        </div>

        <!-- User Info -->
        <div class="px-4 py-4 border-t border-gray-200 dark:border-gray-600">
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
