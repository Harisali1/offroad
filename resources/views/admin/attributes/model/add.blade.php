<x-admin.layout title="Model" heading="Model Create">
    <div id="backend-app">
        <add-model
            :makes="{{$makes->toJson()}}"
        ></add-model>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
