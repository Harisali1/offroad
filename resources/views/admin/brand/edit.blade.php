<x-admin.layout title="Brands" heading="Brands">
    <div id="backend-app">
        <edit-brand :item="{{ $brand->toJson() }}"></edit-brand>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
