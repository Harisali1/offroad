<x-admin.layout title="Admin Edit" heading="Admin Edit">
    <div id="backend-app">
        <edit-admin :item="{{ $admin->toJson() }}"></edit-admin>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
