<x-layout-dashboard>
  <div class="flex min-h-screen">
    <x-sidebar></x-sidebar>
    
    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">My Posts</h1>
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
