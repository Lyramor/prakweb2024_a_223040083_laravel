<x-layout-dashboard>
  <div class="flex flex-col min-h-screen md:flex-row">
    <x-sidebar></x-sidebar>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">My Posts</h1>
      </div>

      <div class="flex justify-center">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded flex items-center mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span>{{ session('success') }}</span>
                <button type="button" class="text-green-700 font-bold ml-2" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        @endif
      </div>

      <div class="flex justify-start mb-4">
        <a href="/dashboard/posts/create" 
          class="bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
          <span>Create new post</span>
          <span class="text-sm">&raquo;</span>
        </a>
      </div>
      
      <div class="my-4">
        <div class="overflow-x-auto bg-white rounded shadow mt-4 md:hidden">
          <div class="flex flex-col space-y-4">
            @foreach ($posts as $post)
            <div class="border border-gray-200 rounded p-4 hover:bg-gray-50">
              <div class="flex justify-between">
                <h2 class="text-lg font-semibold text-gray-900">{{ $post->title }}</h2>
                <span class="text-gray-500 text-sm">{{ $post->category->name }}</span>
              </div>
              <div class="flex items-center space-x-2 mt-2">
                <!-- View -->
                <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-500 hover:text-blue-700">
                  <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
                    View <i class="fa-regular fa-eye"></i>
                  </span>
                </a>
                <!-- Edit -->
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700">
                  <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold">
                    Edit <i class="fa-regular fa-pen-to-square"></i>
                  </span>
                </a>
                <!-- Delete -->
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="inline" id="deleteForm{{ $post->id }}">
                  @method('delete')
                  @csrf
                  <button type="button" onclick="showDeleteModal({{ $post->id }})" class="text-red-500 hover:text-red-700">
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-semibold">
                      Delete <i class="fa-regular fa-circle-xmark"></i>
                    </span>
                  </button>
                </form>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      
        <!-- Tabel untuk Tampilan Desktop -->
        <div class="hidden md:block overflow-x-auto bg-white rounded shadow mt-4">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach ($posts as $post)
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $post->title }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $post->category->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                  <div class="flex items-center space-x-2">
                    <!-- View -->
                    <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-500 hover:text-blue-700 flex items-center">
                      <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold mr-1">
                        View <i class="fa-regular fa-eye"></i>
                      </span>
                    </a>
                    <!-- Edit -->
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-yellow-500 hover:text-yellow-700 flex items-center">
                      <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs font-semibold mr-1">
                        Edit <i class="fa-regular fa-pen-to-square"></i>
                      </span>
                    </a>
                    <!-- Delete -->
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
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      
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
    </main>
  </div>
</x-layout-dashboard>
