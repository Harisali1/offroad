<x-admin.layout title="Smart Assistant" heading="Smart Assistant Create">
    <div id="backend-app">
        <add-smart-assistant
            :makes="{{$makes->toJson()}}"
            :years="{{$years->toJson()}}"
            :mileages="{{$mileages->toJson()}}"
        ></add-smart-assistant>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
