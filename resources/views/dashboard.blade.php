<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                @foreach (auth()->user()->unreadNotifications as $notification)
                <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['message']}}</li></a>
                @endforeach
                @foreach (auth()->user()->readNotifications as $notification)
                <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['message']}}</li></a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
