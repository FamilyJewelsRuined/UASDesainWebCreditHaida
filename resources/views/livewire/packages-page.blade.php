<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
    <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
      <div class="flex flex-wrap mb-24 -mx-3">

          @foreach ($packages as $package)
          <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3">
              <div class="border border-gray-300 dark:border-gray-700">
                <div class="relative bg-gray-200">
                  <a href="/packages/{{ $package->slug }}" class="">
                  <img src="{{ url('storage', $package->image) }}" alt="{{ $package->package_name }}" class="object-cover w-full h-56 mx-auto">
                  </a>
                </div>
                <div class="p-3 ">
                  <div class="flex items-center justify-between gap-2 mb-2">
                    <h3 class="text-xl font-medium dark:text-gray-400">
                      {{ $package->package_name }}
                    </h3>
                  </div>
                  <p class="text-lg ">
                    <span class="text-green-600 dark:text-green-600">
                      {{ Number::currency($package->price, 'IDR') }}
                    </span>
                  </p>
                </div>
              </div>
            </div>

          @endforeach

          </div>
 
        </div>
      </div>
    </div>
  </section>

</div>