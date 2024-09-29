@if(session('success'))
<div x-data="{ showAlert: true }" 
     x-init="setTimeout(() => showAlert = false, 5000)" 
     x-show="showAlert" 
     class="fixed z-50 p-4 text-green-700 bg-green-100 border-l-4 border-green-500 top-4 right-4" 
     role="alert"
>
    <div class="flex items-center">
        <x-heroicon-o-check-circle class="w-5 h-5 text-green-500 me-2" />
        <div>
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    </div>
</div>
@endif

<x-app-layout>
    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <a type="button" href="{{ route('users.create') }}" class="inline-flex items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                <x-heroicon-o-user-plus class="w-5 h-5 me-2" />
                New User
            </a>

            <div class="mt-4 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Created
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white dark:hover:text-blue-200">
                                        <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('users.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-200 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>