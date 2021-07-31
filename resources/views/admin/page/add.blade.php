<x-admin.layout title="Pages" heading="Pages">
    <div id="backend-app">
        <add-page></add-page>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
