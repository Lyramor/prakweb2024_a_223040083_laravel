<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-xs text-blue-600 hover:underline">&laquo; Back to all Posts</a>

                    @if($post->image)
                        <img src="{{ asset('/storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="my-4 w-full h-64 object-cover rounded-lg">
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="my-4 w-full h-64 object-cover rounded-lg">
                    @endif

                    <address class="flex flex-col sm:flex-row items-start my-6 not-italic text-xs sm:text-sm lg:text-base">
                        <div class="flex items-center mr-3 text-gray-900 dark:text-white">
                            <img class="mr-4 w-12 h-12 sm:w-16 sm:h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author" class="text-sm sm:text-lg font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->diffForHumans() }}</p>
                                <a href="/posts?category={{ $post->category->slug }}">
                                    <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-2xl sm:text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>

                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </main>
</x-layout>
