
<x-app-layout>
    <h1>Your Profile info</h1>
    <p>{{ auth()->user()->about }}</p>
</x-app-layout>