<x-app-layout>

    @section('hero')
        <div class="w-full py-32 text-center">
            <h1 class="text-2xl font-bold text-center text-gray-700 md:text-3xl lg:text-5xl">
                {{ __('Welcome to') }} <span class="text-primary-500">{{ __(config('app.name', 'Laravel')) }}</span>
            </h1>
            <p class="text-lg text-gray-500 ltr:mt-1 rtl:mt-3">{{ __('Best Blog in the universe') }}</p>
            <a wire:navigate class="inline-block px-3 py-2 mt-5 text-lg text-white bg-gray-800 rounded"
                href="{{ route('posts.index') }}">@lang('Start Reading')</a>
        </div>
    @endsection

    <div class="w-full mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-primary-500">@lang('Featured Posts')</h2>
            <div class="w-full">
                <div class="grid w-full grid-cols-3 gap-10">
                    @foreach ($featuredPosts as $post)
                        <x-posts.post-card class="col-span-3 md:col-span-1" :post="$post" />
                    @endforeach
                </div>
            </div>
            <a wire:navigate class="block mt-10 text-lg font-semibold text-center text-primary-500"
                href="{{ route('posts.index', ['featured' => 1]) }}">@lang('More Posts')</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl font-bold text-primary-500">@lang('Latest Posts')</h2>
        <div class="w-full mb-5">
            <div class="grid w-full grid-cols-3 gap-10 gap-y-32">
                @foreach ($latestPosts as $post)
                    <x-posts.post-card class="col-span-3 md:col-span-1" :post="$post" />
                @endforeach
            </div>
        </div>
        <a wire:navigate class="block mt-10 text-lg font-semibold text-center text-primary-500"
            href="{{ route('posts.index', ['latest' => 1]) }}">@lang('More Posts')</a>
    </div>

</x-app-layout>
