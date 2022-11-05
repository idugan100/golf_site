<x-app-layout>
    <div class="flex flex-col items-center justify-center mt-10">
        <h1 class="text-3xl font-bold">{{ $user->name ."'s Profile"}}</h1>
        <img class="h-64 mt-10 rounded"src="{{ asset('storage/'.$user->profile_picture) }}" alt="no profile photo">
        <h2 class="text-lg underline mt-10">{{ "About ". $user->name }}</h2>
        <p>{{ $user->about}}</p>
        <h2 class="text-lg underline mt-10">{{$user->name."'s Favorite Golf Course" }}</h2>
        <p>{{ $user->favorite_golf_course }}</p>
        <h1 class="text-xl font-bold mt-10 underline">Friends</h1>
       
    @foreach ($friends as $item)
        
        <a href="/profile/{{ $item->user_id_one}}">{{ $item->name }}</a>
        
    @endforeach
    </div>
</x-app-layout>