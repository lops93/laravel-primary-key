<div x-data="{ dropdownOpen: false }" class="relative my-32 mr-4">
    <button @click="dropdownOpen = !dropdownOpen" type="button" class="relative p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">View notifications</span>
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
            {{auth()->user()->unreadNotifications->count()}}
        </div>
    </button>

    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 z-10 w-full h-full"></div>

    <div x-show="dropdownOpen" class="absolute right-0 z-20 mt-2 overflow-hidden bg-white rounded-md shadow-lg" style="width:20rem;">
        <div class="py-2">
            @foreach (auth()->user()->unreadNotifications as $notification)
                <a href="{{ route('notifications.mark', $notification->id) }}?record_id={{ $notification->data['record_id'] }}" class="flex items-center py-3 pl-4 pr-6 -mx-2 border-b hover:bg-gray-100">
                    <img class="object-cover w-8 h-8 mx-1 rounded-full" src="https://moderncat.com/wp-content/uploads/2021/02/NorwegianForestCat-940x640.jpg" alt="avatar">
                    <p class="flex-1 mx-2 text-sm text-gray-600">
                        <span class="font-bold" href="#">{{$notification->data['user']}}</span>
                        {{ $notification->data['action'] }} 
                        <span class="font-bold text-cyan-800" href="#">{{ $notification->data['record_name'] }} </span>
                        {{ $notification->data['result'] }}.
                        {{ $notification->created_at->diffForHumans(['short' => true, 'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE]) }}
                    </p>
                </a>
            @endforeach
        </div>
        <a href="#" class="block py-2 font-bold text-center text-white bg-gray-800">See all notifications</a>
    </div>
</div>