@props(['post'])
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