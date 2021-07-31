<x-admin.layout title="Addon" heading="Addon">
    <div id="backend-app">
        <edit-addon :item="{{ $addon->toJson() }}"></edit-addon>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
