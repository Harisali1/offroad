<x-admin.layout title="Make" heading="Make Edit">
    <div id="backend-app">
        <edit-make
            :make="{{$make->toJson()}}"
        ></edit-make>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
