<x-admin.layout title="Color" heading="Color Edit">
    <div id="backend-app">
        <edit-color
            :color="{{$color->toJson()}}"
        ></edit-color>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
