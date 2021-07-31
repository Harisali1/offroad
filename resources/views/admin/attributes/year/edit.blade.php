<x-admin.layout title="Year" heading="Year Edit">
    <div id="backend-app">
        <edit-year
            :year="{{$year->toJson()}}"
        ></edit-year>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
