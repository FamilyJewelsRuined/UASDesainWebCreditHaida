<section class="py-14 font-poppins dark:bg-gray-800">
  <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
    <div class="max-w-xl mx-auto">
      <div class="text-center ">
        <div class="relative flex flex-col items-center">
          <h1 class="text-5xl font-bold dark:text-gray-200"> About <span class="text-blue-500"> Us
            </span> </h1>
          <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
            <div class="flex-1 h-2 bg-blue-200">
            </div>
            <div class="flex-1 h-2 bg-blue-400">
            </div>
            <div class="flex-1 h-2 bg-blue-600">
            </div>
          </div>
        </div>
        <p class="mb-12 text-base text-center text-gray-500">
          Laman Profil Programmer
        </p>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">

    @foreach ($about_us as $aboutus)
      <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
          <div class="flex items-center px-6 mb-2 md:mb-0 ">
            <div class="flex mr-2 rounded-full">
            <img src="{{ url('storage', $aboutus->image) }}" alt="" class="object-cover w-12 h-12 rounded-full">
            </div>
            <div>
              <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                {{ $aboutus->name }}
              </h2>
              <p class="text-xs text-gray-500 dark:text-gray-400">
                {{ $aboutus->nim }}
              </p>
            </div>
          </div>
        </div>
        <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
          {{ $aboutus->description }}
        </p>
      </div>
    @endforeach
      
    </div>
  </div>
</section>