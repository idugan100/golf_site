<x-app-layout>
<form action="POST" action="{{ route('profile.edit', auth()->user()) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="flex flex-col ">
    <div class="my-2 ">
        <label> About Me</label>
        <input type="text" name="about">
    </div>
    <div class="my-2">
        <label>Favorite Golf Course</label>
        <input type="text" name="fav-course">
    </div>
    <div class="my-2">
        <label>Profile Picture</label>
        <input type="file">
    </div>
    </div>

    
</form>

</x-app-layout>