<x-admin.layout title="Addons" heading="Addons" xmlns:livewire="">
    <x-slot name="style">
        <livewire:styles/>
    </x-slot>
    <livewire:admin.addon-list/>
    <x-slot name="script">
        <livewire:scripts/>
        <script>
            function deleteAddon(id) {
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
                            "Your Addon is safe.", "error")
                    } else {
                        Livewire.emit('addonDeleted', id);
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
                            "Your selected addons are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })
            }
        </script>
    </x-slot>
</x-admin.layout>
