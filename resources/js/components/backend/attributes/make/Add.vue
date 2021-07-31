<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row  mt-4">
                <div class="col-md-12">
                    <div class="card-box shadow">
                        <h4 class="m-t-0 header-title">Make Information</h4>
                            <div class="card-box ">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="title" class="col-form-label">Title</label>
                                        <input
                                            type="text"
                                            v-model="data.title"
                                            class="form-control"
                                            id="title"
                                            placeholder="Title ">
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-12">
                                        <h4 class="header-title mt-0 mb-3">Upload Image</h4>
                                        <FileUpload
                                            label="Drop Image"
                                            max_file_size="1MB"
                                            :allow_multiple="false"
                                            accept_file_types="image/jpeg, image/png"
                                            @process="onFileUpload"
                                        />
                                    </div>
                                </div>

                            </div>

                            <div class="text-right">
                                <button @click="submit" class="btn btn-primary"> <i class="fas fa-save"></i>
                                    Submit</button>
                                <button @click="cancel" class="btn btn-danger"> <i class="fas fa-times"></i>
                                    Cancel</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</template>

<script>
    import FileUpload from "../../FileUpload";

    export default {
        name: "Add",
        components: {FileUpload},
        data: () => ({
            data: {
                title: '',
                image: '',
            },
            required: {
                'title': "Title",
                'image': "Image",
            },

        }),
        methods: {
            onFileUpload(data){
              this.data.image=data
            },
            submit() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.post('/admin/make', this.data)
                    .then(() => {
                        this.$alertify.success('Make Created successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/make';
                        })
                    }).catch(console.log)
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/make';
                })
            }
        }
    }
</script>
