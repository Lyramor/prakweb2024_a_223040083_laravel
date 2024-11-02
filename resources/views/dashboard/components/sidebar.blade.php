<!-- Sidebar -->
<aside class="bg-white w-64 hidden md:block shadow-md">
  <div class="p-4">
    <nav class="space-y-2">
      <!-- Dashboard Link -->
      <a href="/dashboard" 
        class="block py-2 px-3 rounded {{ request()->is('dashboard') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} text-sm font-medium" 
        aria-current="{{ request()->is('dashboard') ? 'page' : false }}">
        <i class="fa-solid fa-house"></i> Dashboard
      </a>

      <!-- Posts Link -->
      <a href="/dashboard/posts" 
        class="block py-2 px-3 rounded {{ request()->is('dashboard/posts*') ? 'bg-gray-200 text-gray-900' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} text-sm font-medium" 
        aria-current="{{ request()->is('dashboard/posts*') ? 'page' : false }}">
        <i class="fa-regular fa-file-lines"></i>  Post
      </a>
    </nav>
  </div>
</aside>