<x-layout-dashboard>
    <div class="flex min-h-screen">
    <x-sidebar></x-sidebar>
      <!-- Main Content -->
      <main class="flex-1 p-6">
        <div class="flex justify-between items-center border-b pb-4 mb-4">
          <h1 class="text-2xl font-semibold">Welcome Back, {{ auth()->user()->name }}</h1>
        </div>

        <div class="my-4">
          <canvas id="myChart" class="w-full  bg-white rounded shadow"></canvas>
        </div>
      </main>
    </div>
</x-layout-dashboard>