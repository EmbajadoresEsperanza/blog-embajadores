<x-app-layout meta-title="TheCodeholic Blog - About us">

    <div class="container flex flex-wrap py-6 mx-auto">

        <!-- Post Section -->
        <section class="flex flex-col items-center w-full px-3 md:w-full">

            <article class="flex flex-col my-4 shadow">
                @if ($widget && $widget->image)
                    <img src="/storage/{{ $widget->image }}">
                @endif

                <div class="flex flex-col justify-start p-6 bg-white">
                    <h1 class="pb-4 text-3xl font-bold hover:text-gray-700">
                        {{ $widget ? $widget->title : '' }}
                    </h1>
                    <div>
                        {!! $widget ? $widget->content : '' !!}
                    </div>
                </div>
            </article>
        </section>

    </div>
</x-app-layout>
