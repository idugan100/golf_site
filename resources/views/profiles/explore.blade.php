<x-app-layout>
<div class="p-2 max-w-2xl mx-auto">
<h1 class="text-3xl font-bold">Friends</h1>

@foreach ($friends as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->user_id_one  }}">Visit</a></button>
    
</div>


    
@endforeach
<h1 class="text-3xl font-bold">Others</h1>
@foreach ($others as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->id  }}">Visit</a></button>
    
</div>


    
@endforeach


</div>
</x-app-layout>