<x-admin.layout title="Customer" heading="Customer">

    <x-slot name="style">
        <livewire:styles/>
    </x-slot>

    <livewire:admin.customer-list/>

    <x-slot name="script">
        <livewire:scripts/>
        <script>
            function deleteCustomer(id) {
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then(function (t) {
                    if (t.dismiss === 'cancel') {
                        t.dismiss === swal.DismissReason.cancel && swal("Cancelled!",
                            "Your customer is safe.", "error")
                    } else {
                        Livewire.emit('customerDeleted', id);
                    }
                })
            }
            function deleteAll() {
                swal({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then(function (t) {
                    if (t.dismiss === 'cancel') {
                        t.dismiss === swal.DismissReason.cancel && swal("Cancelled!",
                            "Your selected customers are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })

            }
        </script>
    </x-slot>

</x-admin.layout>
