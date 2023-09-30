<x-app-layout>
    <article class="w-full max-w-3xl col-span-4 py-5 mx-auto mt-10 md:col-span-3">
        @if ($post->image)
            <img class="w-full mt-2 rounded-lg ltr:mb-8 rtl:mb-10" src="{{ $post->image_url }}" alt="{{ $post->title }}">
        @endif
        <h1 class="text-4xl font-bold text-gray-800 ltr:text-left rtl:text-right">
            {{ $post->title }}
        </h1>
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center py-5">
                <x-posts.author :author="$post->author" size="md" />
                <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} @lang('min read')</span>
            </div>
            <div class="flex items-center">
                <span class="mr-2 text-gray-500">{{ display_date($post->published_at, 'human') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                    stroke="currentColor" class="w-5 h-5 text-gray-500 rtl:order-first">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <div
            class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
            <div class="flex items-center">
                <livewire:like-button :key="'likebutton-' . $post->id" :$post />
            </div>
            <div>
                <div class="flex items-center">
                </div>
            </div>
        </div>

        <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
            {!! $post->content !!}
        </div>

        <div class="flex items-center mt-10 space-x-4 rtl:space-x-reverse">
            @foreach ($post->categories as $category)
                <x-posts.category-badge :category="$category" />
            @endforeach
        </div>

        <livewire:post-comments :key="'comments' . $post->id" :$post />
    </article>
</x-app-layout>
