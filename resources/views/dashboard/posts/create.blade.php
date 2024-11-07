<x-layout-dashboard>
  <div class="flex flex-col min-h-screen md:flex-row">
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
      <div class="flex justify-between items-center border-b pb-4 mb-4">
        <h1 class="text-2xl font-semibold">Create new post</h1>
      </div>
      <div class="flex justify-start mb-4">
        <a href="/dashboard/posts" 
          class="bg-blue-100 text-blue-600 hover:bg-blue-200 hover:text-blue-800 font-semibold px-3 py-1 rounded flex items-center space-x-2 transition-colors duration-200">
          <span class="text-sm">&laquo;</span>
          <span>Back</span>
        </a>
      </div>

      <!-- Form Wrapper -->
      <div class="bg-white w-full min-h-screen rounded-lg">
        <div class="bg-white p-6 rounded-lg w-full max-w-4xl mx-auto md:ml-1">
          <form class="space-y-4" method="POST" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <!-- Title Field -->
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
              <input type="text" id="title" name="title" required autofocus value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('title') border-red-500 @enderror">
              
              @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            
            <!-- Slug Field -->
            <div>
              <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
              <input type="text" id="slug" name="slug" required value="{{ old('slug') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('slug') border-red-500 @enderror">
              
              @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            
            <!-- Category Field -->
            <div>
              <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
              <select id="category_id" name="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('category_id') border-red-500 @enderror">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
              
              @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Body Field -->
            <div>
              <label for="body" class="block text-sm font-medium text-gray-700">Content</label>
              <input id="body" type="hidden" name="body" value="{{ old('body') }}">
              <trix-editor 
                  input="body" 
                  class="mt-1 block w-full max-h-60 overflow-y-auto rounded-md border-gray-300 shadow-sm @error('body') border-red-500 @enderror">
              </trix-editor>

              @error('body')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Image Upload Field -->
            <div>
              <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
              <input type="file" id="image" name="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm @error('image') border-red-500 @enderror" onchange="previewImage()">
              <img class="img-preview w-40 h-40 object-contain mb-3 rounded-lg col-sm-5" style="display: none;">
              
              @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-2">
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Save</button>
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

    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      };
    }
</script>

  </script>
</x-layout-dashboard>
