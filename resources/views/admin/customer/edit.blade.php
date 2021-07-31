<x-admin.layout title="Customer Edit" heading="Customer Edit">
    <div id="backend-app">
        <edit-customer :item="{{ $customer->toJson() }}"></edit-customer>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
