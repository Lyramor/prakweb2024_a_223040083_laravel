<x-layout-dashboard>
  <div class="flex flex-col min-h-screen md:flex-row">
    <x-sidebar></x-sidebar>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">My Posts</h1>
      </div>

      <div class="my-4">
        <!-- Post Content -->
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
          <div class="flex flex-col lg:flex-row justify-between px-4 mx-auto max-w-screen-xl">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
              <!-- Header Section -->
              <header class="mb-4 lg:mb-6">
                <div class="flex flex-wrap items-center space-x-4 mt-4">
                  <a href="/dashboard/posts" class="text-blue-600 hover:text-blue-800 font-semibold flex items-center space-x-1">
                    <span class="text-sm">&laquo;</span>
                    <span>Back</span>
                  </a>

                  <!-- Edit Button -->
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700 flex items-center">
                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold mr-1">
                      Edit <i class="fa-regular fa-pen-to-square"></i>
                    </span>
                  </a>

                  <!-- Delete Button -->
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline" id="deleteForm{{ $post->id }}">
                    @method('delete')
                    @csrf
                    <button type="button" onclick="showDeleteModal({{ $post->id }})" class="text-red-500 hover:text-red-700 flex items-center">
                      <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold mr-1">
                        Delete <i class="fa-regular fa-circle-xmark"></i>
                      </span>
                    </button>
                  </form>
                </div>
              </header>

              <!-- Delete Confirmation Modal -->
              <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg max-w-xs w-full">
                  <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>
                  <p class="mb-4">Are you sure you want to delete this post?</p>
                  <div class="flex justify-end space-x-2">
                    <button onclick="hideDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                    <button id="confirmDeleteButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Yes, Delete</button>
                  </div>
                </div>
              </div>

              <!-- Author and Category -->
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

              <!-- Title and Image -->
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
              <div class="h-80 overflow-hidden mt-3">
                @if ($post->image)
                    <img src="{{ asset('/storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="object-cover object-center w-full h-full">
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ urlencode($post->category->name) }}" alt="{{ $post->category->name }}" class="object-cover object-center w-full h-full">
                @endif
              </div>
            

              <!-- Post Content -->
              <p class="mt-4">{!! $post->body !!}</p>
            </article>
          </div>
        </main>
      </div>
    </main>
  </div>
</x-layout-dashboard>

<script>
  let deleteFormId;

  function showDeleteModal(postId) {
      deleteFormId = postId;
      document.getElementById('deleteModal').classList.remove('hidden');
  }

  function hideDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
  }

  document.getElementById('confirmDeleteButton').addEventListener('click', function () {
      if (deleteFormId) {
          document.getElementById(`deleteForm${deleteFormId}`).submit();
      }
  });
</script>
