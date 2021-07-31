<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12 ">
                    <h4 class="m-t-0 header-title">Mileage Information</h4>
                    <div class="card-box">
                        <div class="card-box">
                            <div class="form-group col-md-12">
                                <div class="input-group">
                                    <label for="from" class="mx-1 col-form-label"> From </label>
                                    <input
                                        type="text"
                                        v-model="data.from"
                                        id="from"
                                        class="form-control"
                                    >
                                    <label for="to" class="mx-1 col-form-label">To</label>
                                    <input
                                        type="text"
                                        v-model="data.to"
                                        id="to"
                                        class="form-control"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="py-5 my-5">
                        </div>
                        <div class="mt-5 pt-5 text-right">
                            <button
                                @click="submit"
                                class="btn btn-primary">
                                <i class="fas fa-save"></i> Submit
                            </button>
                            <button
                                @click="cancel"
                                class="btn btn-danger">
                                <i class="fas fa-trash"></i> Cancel
                            </button>
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
        name: "Add",
        data: () => ({
            data: {
                from: '',
                to: ''
            },
            required: {
                'from': "From",
                'to': "To"
            }
        }),
        methods: {
            submit() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.post('/admin/mileage', this.data)
                    .then(() => {
                        this.$alertify.success('Mileage Created successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/mileage';
                        })
                    }).catch(console.log)
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/mileage';
                })
            }
        }
    }
</script>
