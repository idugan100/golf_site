<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" enctype="multipart/form-data" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('patch')
            <textarea
                name="message"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message', $post->message) }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                @if ($post->picture)
                <div class="my-4">
                    <img
                    class=" w-48 mr-6 md:block"
                    src= "{{asset('storage/'."$post->picture")  }}" />
                </div>
            @endif
            <div class="mt-4">
                <label> New Picture</label>
                <input type="file" name="picture">
            </div>
            <div class="mt-4">
                <label> No Photo</label>
                <input type="checkbox" name="removePhoto">
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('posts.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>