<x-app-layout>
    <div class="grid w-full grid-cols-4 gap-10">
        <div class="col-span-4 md:col-span-3">
            @livewire('post-list')
        </div>
        <div
            class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 md:border-t-none border-t-gray-100 md:col-span-1 md:px-6 ltr:md:border-l rtl:md:border-r">

            <livewire:search-box />

            @include('posts.partials.categories-box', $categories)
        </div>
    </div>
</x-app-layout>
