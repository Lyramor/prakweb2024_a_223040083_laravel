<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="col-md-5">
    <main class="form-registration">
      <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm text-center"> 
          <p class="mx-auto h-5 w-auto">
            <i class="fa-solid fa-user text-4xl text-indigo-600"></i> 
          </p>
          <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
            Registration Form
          </h2>
        </div>
    
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="/register" method="POST">
            @csrf

            <!-- Field name -->
            <div>
              <label for="name" class="block text-sm font-medium text-gray-900">Name</label>
              <div class="mt-2">
                <input id="name" name="name" type="text" required value="{{ old('name') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                @error('name')
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Field username -->
            <div>
              <label for="username" class="block text-sm font-medium text-gray-900">Username</label>
              <div class="mt-2">
                <input id="username" name="username" type="text" required value="{{ old('username') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                @error('username')
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Field email -->
            <div>
              <label for="email" class="block text-sm font-medium text-gray-900">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" required value="{{ old('email') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                @error('email')
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Field password -->
            <div>
              <label for="password" class="block text-sm font-medium text-gray-900">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                @error('password')
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
          </form>

          <p class="mt-10 text-center text-sm text-gray-500">
            Already registered?
            <a href="/login" class="font-semibold text-indigo-600 hover:text-indigo-500">Login</a>
          </p>
        </div>
      </div>
    </main>
  </div>
</x-layout>