<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12 ">
                    <div class="">
                        <h4 class="m-t-0 header-title">Color Information</h4>
                        <div class="card-box">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="title" class="col-form-label"> Title</label>
                                    <input
                                        type="text"
                                        v-model="data.title"
                                        class="form-control"
                                        id="title"
                                        placeholder="Title">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="color" class="col-form-label"> Color Browse</label>
                                    <input
                                        type="color"
                                        v-model="data.color"
                                        class="form-control"
                                        id="color"
                                        placeholder="Color Browse">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
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
                title: '',
                color: '',
            },
            required: {
                'title': "Title",
                'color': "Color",
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
                axios.post('/admin/color', this.data)
                    .then(() => {
                        this.$alertify.success('Color Created successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/color';
                        })
                    }).catch(console.log)
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/color';
                })
            }
        }
    }
</script>
