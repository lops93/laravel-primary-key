<div x-data="{ dropdownOpen: false }" class="relative my-32 mr-4">
    <button @click="dropdownOpen = !dropdownOpen" type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">View notifications</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
            {{auth()->user()->unreadNotifications->count()}}
        </div>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

    <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
        <div class="py-2">
            @foreach (auth()->user()->unreadNotifications as $notification)
                <a href="#" class="flex items-center pl-4 pr-6 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-8 w-8 rounded-full object-cover mx-1" src="https://moderncat.com/wp-content/uploads/2021/02/NorwegianForestCat-940x640.jpg" alt="avatar">
                    <p class="text-gray-600 text-sm mx-2 flex-1">
                        <span class="font-bold" href="#">{{$notification->data['user']}}</span>
                        {{ $notification->data['action'] }} 
                        <span class="font-bold text-cyan-800" href="#">{{ $notification->data['name'] }} </span>
                        {{ $notification->data['result'] }}.
                        {{ $notification->created_at->diffForHumans(['short' => true, 'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE]) }}
                    </p>
                </a>
            @endforeach
        </div>
        <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all notifications</a>
    </div>
</div>