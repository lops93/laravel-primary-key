<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-4 text-xl">Hi, {{ auth()->user()->name }}</p>
                    <a type="button" href="{{ route('users.index') }}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">users</a>
                </div>
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <a href="#" class="text-success dark:text-white"><li class="p-1 text-success"> {{$notification->data['message']}}</li></a>
                @endforeach
                @foreach (auth()->user()->readNotifications as $notification)
                    <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['message']}}</li></a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
