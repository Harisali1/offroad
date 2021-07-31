<x-admin.layout title="Smart Assistant" heading="Smart Assistant Edit">
    <div id="backend-app">
        <edit-smart-assistant
            :makes="{{$makes->toJson()}}"
            :years="{{$years->toJson()}}"
            :mileages="{{$mileages->toJson()}}"
            :smart_assistant="{{$smart_assistant->toJson()}}"
        ></edit-smart-assistant>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
