
<x-app-layout>
    <div class="flex flex-col items-center justify-center mt-10">
        <h1 class="text-3xl font-bold">Your Profile Info</h1>
        <img class="h-64 mt-10 rounded"src="{{ asset('storage/'.auth()->user()->profile_picture) }}" alt="golf photo">
        <h2 class="text-lg underline mt-10">{{ "About ". auth()->user()->name }}</h2>
        <p>{{ auth()->user()->about }}</p>
        <h2 class="text-lg underline mt-10">{{auth()->user()->name."'s Favorite Golf Course" }}</h2>
        <p>{{ auth()->user()->favorite_golf_course }}</p>
        <a href="{{ route('profile.edit') }}" class=" mt-10 bg-blue-500 rounded p-1">Edit</a>
    </div>
</x-app-layout>