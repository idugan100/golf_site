<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data"action="{{ route('posts.store') }}">
            @csrf
            
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block my-3 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            
                <label> Upload a Photo Here: </label>
                <input name="picture"type="file">
            
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
             {{-- Lets refactor this to make it cleaner --}}
             @if (!empty($posts))
                 
             
            @foreach ($posts as $post)
            <x-post-card :post="$post"></x-post-card>
                
            @endforeach
            
            <div class="mt-6 p-4">{{$posts->links()}}</div>
            @endif
        </div>
    </div>
</x-app-layout>