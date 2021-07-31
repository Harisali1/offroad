<x-admin.layout title="Year" heading="Year">
    <x-slot name="style">
        <livewire:styles/>
    </x-slot>

    <livewire:admin.attributes.year-listing/>

    <x-slot name="script">
        <livewire:scripts/>
        <script>
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
                            "Your selected years are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })

            }
        </script>
    </x-slot>
</x-admin.layout>
