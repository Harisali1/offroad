<x-admin.layout title="Admin Create" heading="Admin Create">
    <div id="backend-app">
        <add-admin></add-admin>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
