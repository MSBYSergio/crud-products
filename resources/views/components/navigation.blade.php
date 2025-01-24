<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="{{ Storage::url('imagenes/logoIes.png')}}" class="h-8" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">IES Al-Ándalus</span>
      </a>
      <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <x-nav-link href="{{route('products.index')}}" :active="request()->routeIs('products.*')">
                <i class="fas fa-users mr-2"></i>Productos
            </x-nav-link>
            <x-nav-link href="{{route('categories.index')}}" :active="request()->routeIs('categories.*')">
                <i class="fa-solid fa-house-user mr-2"></i>Categorías
            </x-nav-link>
        </ul>
      </div>
    </div>
  </nav>