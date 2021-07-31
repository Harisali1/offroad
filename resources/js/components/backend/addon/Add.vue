<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card-box shadow">
                        <h4 class="m-t-0 header-title">Information</h4>
                        <div class="card-box form-row">
                            <div class="form-group col-md-12">
                                <label for="title" class="col-form-label">Title</label>
                                <input type="text" class="form-control" v-model="data.title" id="title"
                                       placeholder="Title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="border: none !important;">
                                <div class="card-box" style="border: none !important;">
                                    <h4 class="header-title mt-0 mb-3">Upload Image</h4>
                                    <FileUpload
                                        label="Drop Image"
                                        max_file_size="1MB"
                                        :allow_multiple="false"
                                        accept_file_types="image/jpeg, image/png"
                                        @process="onFileUpload"
                                    />
                                </div>
                            </div><!-- end col -->
                        </div>
                        <div class="text-right">
                            <button @click="submit" class="btn btn-primary"><i
                                class="fas fa-save"></i>
                                Submit
                            </button>
                            <a href="/admin/addon" class="btn btn-danger"><i class="fas fa-times"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FileUpload from "../FileUpload";

    export default {
        data: () => ({
            data: {
                title: '',
                image: '',
            },
            required: {
                'title': "Title",
                'image': "Image",
            }
        }),
        components: {FileUpload},
        methods: {
            onFileUpload(data) {
                this.data.image = data
            },
            submit: function () {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.post('/admin/addon', this.data)
                    .then(() => {
                        this.$alertify.success("Addon Created Successfully!");
                        this.$nextTick(() => {
                            window.location.href = '/admin/addon';
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
