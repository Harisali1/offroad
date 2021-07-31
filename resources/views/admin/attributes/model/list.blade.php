<x-admin.layout title="Model" heading="Model">
    <x-slot name="style">
        <livewire:styles/>
    </x-slot>

    <livewire:admin.attributes.model-listing/>

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
                            "Your selected models are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })

            }
        </script>
    </x-slot>
</x-admin.layout>
