@props(['post'])
<div {{ $attributes }}>
    @if ($post->image)
        <a wire:navigate href="{{ route('posts.show', $post) }}">
            <div>
                <img class="w-full rounded-xl" src="{{ $post->image_url }}">
            </div>
        </a>
    @endif
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2">
            @if ($post->categories && ($category = $post->categories->first()))
                <x-posts.category-badge :category="$category" />
            @endif
            <p class="text-sm text-gray-500">{{ display_date($post->published_at, 'human') }}</p>
        </div>
        <a wire:navigate href="{{ route('posts.show', $post) }}"
            class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
    </div>
</div>
