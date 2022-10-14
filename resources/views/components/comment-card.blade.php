@props(['comment'])

<div class="border flex align-center space-between" x-show="selected==0">
<p x-show="selected == 0" class="py-4 px-2">
    {{ $comment->user->name . ": " }}
    {{$comment->message}}
    @if ($comment->user->is(auth()->user()))
<form  
    x-show="selected == 0"
    class=" ml-auto mr-6 flex items-center justify-center" 
    method="POST" 
    action="{{ route('comments.destroy',$comment) }}">
    @csrf
    @method('DELETE')
    <button class="bg-red-500 hover:bg-red-700 rounded p-1"type="submit">Delete</button>
</form>

@endif
</p>
</div>

<form action="POST">

</form>