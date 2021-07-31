<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-md-12">
                    <div>
                        <h4 class="header-title mt-0 mb-3">Admin</h4>
                        <div class="card-box">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">User Name*</label>
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Enter admin name"
                                        class="form-control"
                                        id="name"
                                        v-model="data.name"
                                        @change="nameChange(data.name)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email address*</label>
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Enter email address"
                                        class="form-control"
                                        id="email"
                                        v-model="data.email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contact">Contact*</label>
                                    <input
                                        type="number"
                                        name="contact"
                                        placeholder="Enter contact number"
                                        data-toggle="input-mask"
                                        maxlength="11"
                                        class="form-control" id="contact"
                                        v-model="data.contact">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="designation">Designation*</label>
                                    <input
                                        type="text"
                                        name="designation"
                                        placeholder="Enter Designation"
                                        class="form-control"
                                        id="designation"
                                        v-model="data.designation">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password*</label>
                                    <input
                                        id="password"
                                        type="password"
                                        placeholder="Password"
                                        class="form-control"
                                        v-model="data.password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirm_password">Confirm Password *</label>
                                    <input
                                        type="password"
                                        placeholder="Confirm Password"
                                        class="form-control"
                                        id="confirm_password"
                                        v-model="data.confirm_password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right mb-0">
                            <button
                                @click="submit" class="btn btn-primary"><i
                                class="fas fa-save"></i>
                                Submit
                            </button>
                            <a href="/admin/admin" class="btn btn-danger"><i class="fas fa-times"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->

    </div>
</template>

<script>
    export default {
        data: () => ({
            data: {
                name: '',
                email: '',
                contact: '',
                designation: '',
                password: '',
                confirm_password: ''
            },
        }),
        methods: {
            nameChange: function (name) {
                axios.post('/admin/admin/name_check', {name: name})
                    .then((res) => {
                        if (res.data.name === 'Exists') {
                            this.$swal({
                                title: 'Are you sure?',
                                text: "This Admin Name Is Already Exists!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Go Ahead!',
                                cancelButtonText: 'I wanna change',
                            }).then((result) => {
                                if (result.isDismissed) {
                                    this.data.name = '';
                                }
                            })
                        }
                    }).catch(console.log)
            },
            submit: function () {
                axios.post('/admin/admin', this.data)
                    .then(() => {
                        this.$alertify.success("Admin Created Successfully!");
                        this.$nextTick(() => {
                            window.location.href = '/admin/admin';
                        })
                    })
                    .catch(err => {
                        if (err.response.status === 422) {
                            let errors = Object.values(err.response.data.errors);
                            for (let error of errors) {
                                this.$alertify.error(error[0]);
                            }
                        }
                    })
            },
        }
    }
</script>

<style scoped>

</style>
