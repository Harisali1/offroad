<x-admin.layout title="Coupon" heading="Coupon Edit">
    <div id="backend-app">
        <edit-coupon
            :coupon="{{$coupon->toJson()}}"
        ></edit-coupon>
    </div>
    <x-slot name="script">
        <script src="{{asset('js/backend.js')}}"></script>
    </x-slot>
</x-admin.layout>
