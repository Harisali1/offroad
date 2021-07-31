<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12 ">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Year Information</h4>
                        <div class="card-box">
                            <div class=" row">
                                <div class="form-group col-md-8">
                                    <label for="title" class="col-form-label"> Title</label>
                                    <input
                                        type="text"
                                        v-model="data.title"
                                        class="form-control"
                                        id="title"
                                        placeholder="Title">
                                </div>
                                <div class="col-md-4 text-center mt-4">
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
                        <div class="mb-5 pb-5"></div>
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
                title: '',
            },
            required: {
                'title': "Title",
            },

        }),
        methods: {
            submit() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.post('/admin/year', this.data)
                    .then(() => {
                        this.$alertify.success('Year Created successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/year';
                        })
                    }).catch(console.log)
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/year';
                })
            }
        }
    }
</script>
<style scoped>
    .mx-datepicker {
        width: 100% !important;
    }
</style>
