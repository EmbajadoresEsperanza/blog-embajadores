<x-app-layout meta-title="EmbajadoresEsperanza Blog"
    meta-description="Lorem ipsum dolor sit amet, consectetur adipisicing elit">
    <div class="container max-w-4xl py-6 mx-auto">

        <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-3">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="pb-1 mb-3 text-lg font-bold uppercase border-b-2 sm:text-xl"
                    style="border-color: orange;color:orange;">
                    Latest Post
                </h2>

                @if ($latestPost)
                    <x-post-item :post="$latestPost" />
                @endif
            </div>

            <!-- Popular 3 post -->
            <div>
                <h2 class="pb-1 mb-3 text-lg font-bold uppercase border-b-2 sm:text-xl"
                    style="border-color: orange;color:orange;">
                    Popular Posts
                </h2>
                @foreach ($popularPosts as $post)
                    <div class="grid grid-cols-4 gap-2 mb-4">
                        <a href="{{ route('view', $post) }}" class="pt-1">
                            <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" />
                        </a>
                        <div class="col-span-3">
                            <a href="{{ route('view', $post) }}">
                                <h3 class="text-sm uppercase truncate whitespace-nowrap">{{ $post->title }}</h3>
                            </a>
                            <div class="flex gap-4 mb-2">
                                @foreach ($post->categories as $category)
                                    <a href="#"
                                        class="p-1 text-xs font-bold text-white uppercase bg-blue-500 rounded">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </div>
                            <div class="text-xs">
                                {{ $post->shortBody(10) }}
                            </div>
                            <a href="{{ route('view', $post) }}"
                                class="text-xs text-gray-800 uppercase hover:text-black">Continue
                                Reading <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recommended posts -->
        <div class="mb-8">
            <h2 class="pb-1 mb-3 text-lg font-bold uppercase border-b-2 sm:text-xl"
                style="border-color: orange;color:orange;">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                @foreach ($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false" />
                @endforeach
            </div>
        </div>

        <!-- Latest Categories -->
        @foreach ($categories as $category)
            <div>
                <h2 class="pb-1 mb-3 text-lg font-bold uppercase border-b-2 sm:text-xl"
                    style="color: orange;border-color:orange;">
                    Category "{{ $category->title }}"
                    <a href="{{ route('by-category', $category) }}">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </h2>

                <div class="mb-6">
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-3">
                        @foreach ($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-item :post="$post" :show-author="false" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</x-app-layout>
