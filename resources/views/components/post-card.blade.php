@props(['post'])
<div class="p-6 flex space-x-2">
    <span class="text-blue-800 font-bold">{{ count($post->liked)}}</span>
 <img src="{{ asset("images/thumbs.svg") }}" class="h-6 w-6 text-gray-600 -scale-x-100" alt="">
    
    <div class="flex-1">
        <div class="flex justify-between items-center">
            <div>
                <span class="text-gray-800">{{ $post->user->name }}</span>
                

                <small class="ml-2 text-sm text-gray-600">{{ $post->created_at->format('j M Y, g:i a') }}</small>
                {{-- if the comment has been edited, then the edited icon will show --}}
                @unless ($post->created_at->eq($post->updated_at))
                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                @endunless
            </div>
            
            <x-dropdown>
               
                <x-slot name="trigger">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                    </button>
                </x-slot>
                
                <x-slot name="content">
                    @if ($post->user->is(auth()->user()))
                    <x-dropdown-link :href="route('posts.edit', $post)">
                        {{ __('Edit') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('posts.destroy', $post) }}">
                        @csrf
                        @method('delete')
                        <x-dropdown-link :href="route('posts.destroy', $post)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                    </form>
                    @endif
                    <form method="GET" action="{{ route('profile.show', $post->user->id) }}">
                        @csrf
                        
                        <x-dropdown-link :href="route('profile.show', $post->user)" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('View Profile') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
               
            </x-dropdown>
       
        </div>
        {{-- Styling of photo and caption needs work --}}
        <div class="mx-2 my-5 flex align-center items-center">
            @if ($post->picture)
                <div>
                    <img
                    class=" border-4 p-3 w-48 mr-6 md:block"
                    src= "{{asset('storage/'."$post->picture")  }}" />
                </div>
            @endif
    
        <p class="mt-4 text-lg text-gray-900">{{ $post->message }}</p>
    </div>
    {{-- checks if the post is already liked --}}
    @php
    $likedState=false;
    foreach($post->liked as $liker){
     
        if($liker->id==auth()->user()->id){
            $likedState=true;
        }
    }
    @endphp
    <form action="/likes" method="POST">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="post_id" value={{  $post->id}}>
    <button class="bg-blue-800 text-white p-2 rounded font-bold">{{ $likedState?"Unlike":"Like" }}</button>
    </form>
    
   

    </div>
    

    
    
</div>

<div class="block w-11/12 my-4 mx-auto" x-data="{selected:null}">
    <li class="flex align-center flex-col">
        <h4 @click="selected !== 0 ? selected = 0 : selected = null"
            class="cursor-pointer px-5 py-3 bg-blue-800 text-white text-center inline-block hover:opacity-75 hover:shadow  rounded-t">Comments</h4>
        
    @foreach ($post->comments as $comment)
        <x-comment-card :comment="$comment"></x-comment-card>
    @endforeach
                
        <x-create-comment :post="$post"></x-create-comment>
        
    </li>
</div>
<div>
    
</div>
