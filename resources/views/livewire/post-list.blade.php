<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="flex text-gray-800 gap-x-2">
            @if ($this->activeCategory() || $search)
                <button wire:click="clearFilters()"
                    class="p-1 text-xs text-gray-600 bg-gray-200 rounded-full ltr:mr-1 rtl:ml-1">@lang('clear')</button>
            @endif
            @if ($category = $this->activeCategory())
                <span class="ltr:ml-2 rtl:mr-2">
                    <x-badge :textColor="$category->text_color" :bgColor="$category->bg_color">{{ $category->title }}</x-badge>
                </span>
            @endif

            @if ($search)
                <span class="ltr:ml-2 rtl:mr-2">
                    @lang('Containing') <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light rtl:space-x-reverse">
            <button wire:click="setSort('desc')"
                class="{{ $sort === 'desc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-400' }} py-4">{{ __('Latest') }}</button>
            <button wire:click="setSort('asc')"
                class="{{ $sort === 'asc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-400' }} py-4">{{ __('Oldest') }}</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
