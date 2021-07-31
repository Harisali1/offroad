<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="">
                        <h4 class="m-t-0 header-title">Information</h4>
                        <div class="card-box form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name"
                                    placeholder="First Name"
                                    v-model="data.first_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name"
                                    placeholder="Last Name"
                                    v-model="data.last_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email" class="col-form-label">Email </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Email"
                                    v-model="data.email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact" class="col-form-label">Contact</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="contact"
                                    placeholder="Contact Name"
                                    v-model="data.contact">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password" class="col-form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Password"
                                    v-model="data.password">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="confirm_password" class="col-form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="confirm_password"
                                    placeholder="Confirm Password"
                                    v-model="data.confirm_password">
                            </div>
                            <div class="form-group col-md-6">

                                <label for="address" class="col-form-label">Address</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Abc, Street 3 , Karachi"
                                    v-model="data.address">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-form-label">Address at</label>
                                <select2
                                    :settings="{placeholder: 'Please Select Address'}"
                                    :options="['Home', 'Office', 'Other']"
                                    name="address_at"
                                    v-model="data.address_at">
                                </select2>
                            </div>
                        </div>
                        <div class="text-right">
                            <button
                                @click="submit" class="btn btn-primary"><i
                                class="fas fa-save"></i>
                                Update
                            </button>
                            <a href="/admin/customer" class="btn btn-danger"><i class="fas fa-times"></i>
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


<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 38px;
    }
    .select2-container--default .select2-selection--single {
        height: 38px;
    }
</style>

<script>
    export default {
        props: ['item'],
        data() {
            return {
                data: {...this.item},
            }
        },
        methods: {
            submit: function () {
                axios.put(`/admin/customer/${this.item.id}`, this.data)
                    .then(() => {
                        this.$alertify.success("Customer Updated Successfully!");
                        this.$nextTick(() => {
                            window.location.href = '/admin/customer';
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
