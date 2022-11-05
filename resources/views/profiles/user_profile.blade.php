

<x-app-layout>
    <div class="flex flex-col items-center justify-center mt-10">
        <h1 class="text-3xl font-bold">Your Profile Info</h1>
        <img class="h-64 mt-10 rounded"src="{{ asset('storage/'.auth()->user()->profile_picture) }}" alt="missing profile photo">
        <h2 class="text-lg underline mt-10">{{ "About ". auth()->user()->name }}</h2>
        <p>{{ auth()->user()->about }}</p>
        <h2 class="text-lg underline mt-10">{{auth()->user()->name."'s Favorite Golf Course" }}</h2>
        <p>{{ auth()->user()->favorite_golf_course }}</p>
        <a href="{{ route('profile.edit') }}" class=" mt-10 bg-blue-500 rounded p-1">Edit</a>
     <h1 class="text-xl font-bold mt-10 underline">Friends</h1>
       
    @foreach ($friends as $item)
        <p>{{ $item->name }}</p>
        
    @endforeach
  
    </div>
    
</x-app-layout>