<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div class="flex h-full items-center">
    <main class="w-full max-w-md mx-auto p-6">
      <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <div class="p-4 sm:p-7">
          <div class="text-center">
            <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Umroh Registration</h1>
          </div>

          <hr class="my-5 border-slate-300">

          <!-- Form -->
          <form wire:submit.prevent='save'>
            <div class="grid gap-y-6">

            <div>
                <label for="registrant" class="block text-sm mb-2 dark:text-white">Registrant</label>
                <div class="relative">
                  <input type="text" id="registrant" wire:model="registrant" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" aria-describedby="registrant-error">
                  @error('registrant')
                  <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg>
                  </div>
                  @enderror
                </div>
                @error(''registrant')
                <p class="text-xs text-red-600 mt-2" id="registrant-error">{{ $message }}</p>
                @enderror
              </div>

              <!-- Package Selection -->
              <div>
                <label for="package_name" class="block text-sm mb-2 dark:text-white">Package:</label>
                <select wire:model="package_name" id="package_name" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                  <option value="">Choose Package</option>
                  @foreach($packages as $package)
                    <option value="{{ $package->package_name }}">{{ $package->package_name }}</option>
                  @endforeach
                </select>
                @error('package_name') <span class="text-xs text-red-600 mt-2">{{ $message }}</span> @enderror
              </div>

              <!-- Number of People -->
              <div>
                <label for="number_of_people" class="block text-sm mb-2 dark:text-white">Number of People:</label>
                <input type="number" wire:model="number_of_people" id="number_of_people" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" min="1">
                @error('number_of_people') <span class="text-xs text-red-600 mt-2">{{ $message }}</span> @enderror
              </div>

              <!-- Notes -->
              <div>
                <label for="notes" class="block text-sm mb-2 dark:text-white">Notes (Optional):</label>
                <textarea wire:model="notes" id="notes" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="3"></textarea>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Register</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
      </div>
    </main>
  </div>
</div>
