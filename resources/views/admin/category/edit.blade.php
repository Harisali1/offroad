<x-admin.layout title="Category" heading="Category">
    <div id="backend-app">
        <edit-category :item="{{ $category->toJson() }}"></edit-category>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
