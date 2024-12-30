<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="overflow-hidden bg-white py-11 font-poppins dark:bg-gray-800">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full mb-8 md:w-1/2 md:mb-0" x-data="{ mainImage: 'https://m.media-amazon.com/images/I/71f5Eu5lJSL._SX679_.jpg' }">
          <div class="sticky top-0 z-50 overflow-hidden ">
            <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
              <img src="{{ url('storage', $package->image) }}" alt="{{ $package->package_name }}" class="object-cover w-full lg:h-full ">
            </div>
          </div>
        </div>
        <div class="w-full px-4 md:w-1/2 ">
          <div class="lg:pl-20">
            <div class="mb-8 ">
              <h2 class="max-w-xl mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                {{ $package->package_name }}
              </h2>
              <p class="inline-block mb-6 text-4xl font-bold text-gray-700 dark:text-gray-400 ">
                <span>
                  {{ Number::currency($package->price, 'IDR') }}
                </span>
              </p>
              <p class="max-w-md text-gray-700 dark:text-gray-400">
                {!! Str::markdown($package->description) !!}
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
</div>