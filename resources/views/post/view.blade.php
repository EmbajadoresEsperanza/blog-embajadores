<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
    <div class="flex">
        <!-- Post Section -->
        <section class="flex flex-col w-full px-3 md:w-2/3">
            <article class="flex flex-col my-4 shadow">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{ $post->getThumbnail() }}">
                </a>
                <div class="flex flex-col justify-start p-6 bg-white">
                    <div class="flex gap-4">
                        @foreach ($post->categories as $category)
                            <a href="#" class="pb-4 text-sm font-bold uppercase" style="color:orange !important;">
                                {{ $category->title }}
                            </a>
                        @endforeach
                    </div>
                    <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
                        {{ $post->title }}
                    </h1>
                    <p href="#" class="pb-8 text-sm">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>,
                        Published on
                        {{ $post->getFormattedDate() }} | {{ $post->human_read_time }}
                    </p>
                    <div>
                        {!! $post->body !!}
                    </div>

                    <livewire:upvote-downvote :post="$post" />
                </div>
            </article>

            <div class="flex w-full pt-6">
                <div class="w-1/2">
                    @if ($prev)
                        <a href="{{ route('view', $prev) }}"
                            class="block w-full p-6 text-left bg-white shadow hover:shadow-md">
                            <p class="flex items-center text-lg font-bold text-blue-800">
                                <i class="pr-1 fas fa-arrow-left"></i>
                                Previous
                            </p>
                            <p class="pt-2">{{ \Illuminate\Support\Str::words($prev->title, 5) }}</p>
                        </a>
                    @endif
                </div>
                <div class="w-1/2">
                    @if ($next)
                        <a href="{{ route('view', $next) }}"
                            class="block w-full p-6 text-right bg-white shadow hover:shadow-md">
                            <p class="flex items-center justify-end text-lg font-bold text-blue-800">Next
                                <i class="pl-1 fas fa-arrow-right"></i>
                            </p>
                            <p class="pt-2">
                                {{ \Illuminate\Support\Str::words($next->title, 5) }}
                            </p>
                        </a>
                    @endif
                </div>
            </div>

            <livewire:comments :post="$post" />
        </section>

        <x-sidebar />
    </div>
</x-app-layout>
