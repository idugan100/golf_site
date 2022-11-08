<x-app-layout>
<div class="p-2 max-w-2xl mx-auto">

@if (!empty($requesting))
<h1 class="text-3xl font-bold m-2 p-2">Incoming Friend Requests</h1>
@foreach ($requesting as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->id  }}">Visit</a></button>
    <button class="border p-1 ml-4">Accept</button>
    <button class="border p-1 ml-4">Reject</button>
</div>
@endforeach
@endif

@if (!empty($pending))
<h1 class="text-3xl font-bold m-2 p-2">Pending Friend Requests</h1>
@foreach ($pending as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->id  }}">Visit</a></button>
 
</div> 
@endforeach
@endif

@if (!empty($friends))
<h1 class="text-3xl font-bold m-2 p-2">Friends</h1>
@foreach ($friends as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->user_id_one  }}">Visit</a></button>
    
</div>
@endforeach
@endif

@if (!empty($others))
<h1 class="text-3xl font-bold m-2 p-2">Others</h1>
@foreach ($others as $profile)
<div class="bg-blue-800 text-white p-2 m-2 font-bold border">
    {{ $profile->name }}  
    
    <button class="border p-1 ml-4"><a href= "/profile/{{$profile->id  }}">Visit</a></button>
    <button class="border p-1 ml-4">Send Friend Request</button>
</div>
@endforeach
@endif
</div>
</x-app-layout>