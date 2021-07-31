<x-admin.layout title="Mileage" heading="Mileage Edit">
    <div id="backend-app">
        <edit-mileage
            :mileage="{{$mileage->toJson()}}"
        ></edit-mileage>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
