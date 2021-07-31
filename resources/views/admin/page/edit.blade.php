<x-admin.layout title="Pages" heading="Pages">
    <div id="backend-app">
        <edit-page :item="{{ $page->toJson() }}"></edit-page>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
