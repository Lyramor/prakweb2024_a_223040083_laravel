<x-layout-dashboard>
  <div class="flex min-h-screen">
    <x-sidebar></x-sidebar>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">My Posts</h1>
      </div>
      <div class="flex justify-center">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-2 py-1 inline-flex items-center space-x-2 mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span>{{ session('success') }}</span>
                <button type="button" class="text-green-700 font-bold ml-2" onclick="this.parentElement.style.display='none';">
                    &times;
                </button>
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
        <!-- Responsive Table Wrapper -->
        <div class="overflow-x-auto bg-white rounded shadow mt-4">
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
                <td class="px-4 py-2 whitespace-nowrap text-l text-gray-500">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-l text-gray-900">{{ $post->title }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-l text-gray-900">{{ $post->category->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-l text-gray-900">
                  <a href="/dashboard/posts/{{ $post->slug }}" class="text-blue-500 hover:text-blue-700">
                    <i class="fa-regular fa-eye"></i>
                  </a>
                  <a href="/dashboard/posts/{{ $post->slug }}" class="text-yellow-500 hover:text-yellow-700">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </a>
                  <a href="/dashboard/posts/{{ $post->slug }}" class="text-red-500 hover:text-red-700">
                    <i class="fa-regular fa-circle-xmark"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
    
  </div>
</x-layout-dashboard>


