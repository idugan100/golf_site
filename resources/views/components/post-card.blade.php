@props(['post'])
<div class="p-6 flex space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
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
                </x-slot>
               
            </x-dropdown>
       
        </div>
        <p class="mt-4 text-lg text-gray-900">{{ $post->message }}</p>
    </div>
    
</div>
<div class="block w-11/12 my-4 mx-auto" x-data="{selected:null}">
    <li class="flex align-center flex-col">
        <h4 @click="selected !== 0 ? selected = 0 : selected = null"
            class="cursor-pointer px-5 py-3 bg-indigo-300 text-white text-center inline-block hover:opacity-75 hover:shadow  rounded-t">Comments</h4>
        
            @foreach ($post->comments as $comment)
            <p x-show="selected == 0" class="border py-4 px-2 flex">
                {{$comment->message}}
                @if ($comment->user->is(auth()->user()))
            <form  
                x-show="selected == 0"
                class=" inline bg-black rounded text-white mx-auto" 
                method="POST" 
                action="{{ route('comments.destroy',$comment) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            @endif
            </p>
            

            <form action="POST">

            </form>
            @endforeach
            
<div x-show="selected ==0"class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    
    <form  class="my-0"method="POST" action="{{ route('comments.store') }}">
        @csrf
        <input  class="invisible" type="text" name='post_id' value={{ $post->id }}>
        <textarea
            name="message"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
        <div class="mt-4 space-x-2">
            <x-primary-button>{{ __('Comment') }}</x-primary-button>
            <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
        
    </li>
</div>
<div>
    
</div>
