<x-admin.layout title="Category" heading="Category">

    <x-slot name="style">
        <livewire:styles/>
    </x-slot>

    <livewire:admin.category-list/>

    <x-slot name="script">
        <livewire:scripts/>
        <script>
            function deleteCategory(id) {
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
                            "Your category is safe.", "error")
                    } else {
                        Livewire.emit('categoryDeleted', id);
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
                            "Your selected categories are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })

            }
        </script>
    </x-slot>

</x-admin.layout>
