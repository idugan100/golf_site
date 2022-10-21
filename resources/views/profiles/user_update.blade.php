<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-3xl font-bold">Edit Profile</h1>
        <form method="POST"  action="/profile/update" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <label>About Me</label>
            
            <div>
            <textarea type="text" name="about">{{ old('about', auth()->user()->about) }}</textarea>
            </div>
            <label>Favorite Golf Course</label>
            <div>
            
            <textarea type="text" name="favorite_golf_course">{{ old('about', auth()->user()->favorite_golf_course) }}</textarea>
           </div>
           <label>Profile Photo</label>
           @if (auth()->user()->profile_picture)
                <div class="my-4">
                    <img
                    class=" w-48 mr-6 md:block"
                    src= "{{asset('storage/'.auth()->user()->profile_picture )  }}" />
                </div>
            @endif
           <div>
            
            <input type="file" name="profile_picture">
           </div>
            
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('profile') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>