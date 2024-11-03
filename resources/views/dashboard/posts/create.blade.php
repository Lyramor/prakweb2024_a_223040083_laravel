<x-layout-dashboard>
  <div class="flex min-h-screen">
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">Create new post</h1>
      </div>
      <div class="flex justify-start mb-4">
        <a href="/dashboard/posts" 
          class="bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
          <span class="text-sm">&laquo;</span>
          <span>Back to all my posts</span>
        </a>
      </div>

      <!-- Form Wrapper -->
      <div class="bg-white p-6 rounded-lg shadow-md w-full lg:w-4/4">
        <div class="bg-white p-6 w-full lg:w-3/4">
          <form class="space-y-4" method="POST" action="/dashboard/posts">
            @csrf
            <!-- Title Field -->
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
              <input type="text" id="title" name="title" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
          
            <!-- Slug Field -->
            <div>
              <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
              <input type="text" id="slug" name="slug" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>
          
            <!-- Category Field -->
            <div>
              <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
              <select id="category_id" name="category_id" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            </div>

            <!-- Body Field -->
            <div>
              <label for="body" class="block text-sm font-medium text-gray-700">Content</label>
              <input id="body" type="hidden" name="body">
              <trix-editor input="body" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm"></trix-editor>
            </div>
          
            <!-- Submit Button -->
            <div class="flex justify-end space-x-2">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Save</button>
              <a href="/dashboard/posts" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-md">Cancel</a>
            </div>
          </form>        
        </div>
      </div>

    </main>
  </div>

  <script>
    // Fungsi untuk mengubah teks menjadi slug
    function generateSlug(text) {
      return text.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')      // Hapus karakter yang bukan alfanumerik
        .trim()                             // Hapus spasi di awal dan akhir
        .replace(/\s+/g, '-')               // Ganti spasi dengan -
        .replace(/-+/g, '-');               // Ganti banyak strip dengan satu strip
    }
  
    // Dapatkan elemen title dan slug
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
  
    // Pantau perubahan pada title untuk mengisi slug
    titleInput.addEventListener('input', function() {
      slugInput.value = generateSlug(titleInput.value);
    });
  </script>
</x-layout-dashboard>
