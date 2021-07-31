<x-admin.layout title="Admin" heading="Admin">

    <x-slot name="style">
        <livewire:styles/>
    </x-slot>

    <livewire:admin.admin-list/>

    <x-slot name="script">
        <livewire:scripts/>
        <script>
            window.signedIn = '<?php echo e(auth()->check()); ?>';
            window.signedInUser = <?php echo auth()->user()->toJson(); ?>;
        </script>
        <script>
            function deleteAdmin(admin) {
                if (signedInUser.id === admin.id) {
                    swal({
                        icon: 'error',
                        title: 'Sorry!',
                        text: 'You can not delete your account because you`re logged in!',
                    });
                } else {
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
                                "Your admin is safe.", "error")
                        } else {
                            Livewire.emit('adminDeleted', admin.id);
                        }
                    })
                }
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
                            "Your selected admins are safe.", "error")
                    } else {
                        Livewire.emit('deleteAll');
                    }
                })
            }

            function status(admin) {
                if (signedInUser.id === admin.id) {
                    swal({
                        icon: 'error',
                        title: 'Sorry!',
                        text: 'You can not change your status because you`re logged in!',
                    });
                } else {
                    Livewire.emit('status', admin);
                }
            }
        </script>
    </x-slot>

</x-admin.layout>
