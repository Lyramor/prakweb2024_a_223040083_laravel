
<nav class="bg-gray-800 sticky top-0 z-10 p-4 shadow-md">
  <div class="flex items-center justify-between">
    <a href="#" class="text-white text-lg font-semibold">Cylia Tech</a>
    <input class="hidden md:block w-full max-w-md mx-4 px-3 py-2 rounded bg-gray-700 text-white placeholder-gray-400" type="text" placeholder="Search" aria-label="Search">
    <div>
      <form action="/logout" method="POST">
        @csrf
        <button href="/logout" type="submit" class="block px-4 py-2 text-sm text-gray-100 hover:bg-gray-700 border rounded">Log out</button>
    </form>
    </div>
  </div>
</nav>