<x-admin.layout title="Model" heading="Model Edit">
    <div id="backend-app">
        <edit-model
            :makes="{{$makes->toJson()}}"
            :models="{{$model->toJson()}}"
        ></edit-model>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
