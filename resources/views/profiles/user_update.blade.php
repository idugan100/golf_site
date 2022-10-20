<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1>edit screen</h1>
        <form method="POST"  action="/profile/update" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
           <div>
            <label>About Me</label>
            <input type="text" name="about">
           </div>
           <div>
            <label>Favorite Golf Course</label>
            <input type="text" name="favorite_golf_course">
           </div>
           <div>
            <label>Profile Photo</label>
            <input type="file" name="profile_picture">
           </div>
            
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('profile') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>