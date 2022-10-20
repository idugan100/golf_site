
<x-app-layout>
    <h1>Your Profile info</h1>
    <p>{{ auth()->user()->about }}</p>
    <a href="{{ route('profile.edit') }}" class="bg-blue-500 rounded p-1">Edit</a>
</x-app-layout>