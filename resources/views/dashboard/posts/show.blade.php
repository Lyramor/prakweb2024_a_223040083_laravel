<x-layout-dashboard>
  <div class="flex min-h-screen">
    <x-sidebar></x-sidebar>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">My Posts</h1>
      </div>

      <div class="my-4">

        <!-- Post Content -->
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
          <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
              <header class="mb-4 lg:mb-6 not-format">
                <div class="flex items-center space-x-4 mt-4">
                  <a href="/dashboard/posts" 
                    class="text-blue-600 hover:text-blue-800 font-semibold flex items-center space-x-1">
                    <span class="text-sm">&laquo;</span>
                    <span>Back to all Posts</span>
                  </a>
                  
                  <a href="/dashboard/posts/{{ $post->slug }}" 
                    class="bg-yellow-100 text-yellow-600 hover:bg-yellow-200 hover:text-yellow-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
                      <i class="fa-regular fa-pen-to-square"></i>
                      <span>Edit</span>
                  </a>
                  
                  <a href="/dashboard/posts/{{ $post->slug }}" 
                    class="bg-red-100 text-red-600 hover:bg-red-200 hover:text-red-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
                      <i class="fa-regular fa-circle-xmark"></i>
                      <span>Delete</span>
                  </a>
              </div>
              
                <address class="flex items-center my-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                    <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                    <div>
                      <a href="/posts?author={{ $post->author->username}}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                      <p class="text-base text-gray-500 dark:text-gray-400 mb-1">{{ $post->created_at->diffForHumans() }}</p>
                      <a href="/posts?category={{ $post->category->slug }}">
                        <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                          {{ $post->category->name }}
                        </span>
                      </a>
                    </div>
                  </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
              </header>
              <p>{!! $post->body !!}</p>
            </article>
          </div>
        </main>
      </div>
    </main>
  </div>
</x-layout-dashboard>
