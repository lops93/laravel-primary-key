<x-app-layout>
    @foreach ($users as $user)
        {{ $user->name }}
    @endforeach
</x-app-layout>