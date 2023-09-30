<nav class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
    <div class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo class="h-10" />
        </a>
        <div class="top-menu ltr:ml-10 rtl:mr-10">
            <div class="flex space-x-4 rtl:space-x-reverse">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('Blog') }}
                </x-nav-link>
            </div>
        </div>
    </div>
    <div class="flex items-center rtl:space-x-reverse md:space-x-6">
        @auth
            @include('layouts.partials.user-area')
        @else
            @include('layouts.partials.guest-area')
        @endauth
    </div>
</nav>
