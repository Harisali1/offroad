<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Information</h4>
                        <div class="card-box form-row">
                            <div class="form-group col-md-6">
                                <label for="title" class="col-form-label">Title</label>
                                <input
                                    type="text"
                                    v-model="data.title"
                                    class="form-control"
                                    id="title"
                                    placeholder="Title">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug" class="col-form-label">Slug</label>
                                <input
                                    type="text"
                                    :value="slug"
                                    class="form-control"
                                    id="slug" disabled
                                    placeholder="Slug is auto generated">
                            </div>
                        </div>
                        <h4 class="m-t-0 header-title">Description</h4>
                        <ckeditor v-model="data.description"></ckeditor>
                        <div>
                            <h4 class="header-title mt-0 mb-3 mt-4">Banner Image</h4>
                            <FileUpload
                                :item="item"
                                :myFiles="data.image"
                                label="Drop Image"
                                max_file_size="1MB"
                                :allow_multiple="false"
                                accept_file_types="image/jpeg, image/png"
                                @process="onFileUpload"
                            />
                        </div>
                        <div class="text-right">
                            <button
                                @click="submit"
                                class="btn btn-primary"><i
                                class="fas fa-save"></i>
                                Update
                            </button>
                            <a href="/admin/page" class="btn btn-danger"><i class="fas fa-times"></i>
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container-fluid -->
</template>

<script>
    import FileUpload from "../FileUpload";

    export default {
        props: ['item'],
        data() {
            return {
                data: {...this.item},
                required: {
                    'title': "Title",
                    'description': "Description",
                    'image': "Banner Image"
                }
            }
        },
        components: {FileUpload},
        computed: {
            slug: function () {
                return this.slugify(this.data.title)
            }
        },
        methods: {
            slugify(text, ampersand = 'and') {
                const a = 'àáäâèéëêìíïîòóöôùúüûñçßÿỳýœæŕśńṕẃǵǹḿǘẍźḧ';
                const b = 'aaaaeeeeiiiioooouuuuncsyyyoarsnpwgnmuxzh';
                const p = new RegExp(a.split('').join('|'), 'g');

                const slug = text.toString().toLowerCase()
                    .replace(/[\s_]+/g, '-')
                    .replace(p, c =>
                        b.charAt(a.indexOf(c)))
                    .replace(/&/g, `-${ampersand}-`)
                    .replace(/[^\w-]+/g, '')
                    .replace(/--+/g, '-')
                    .replace(/^-+|-+$/g, '');
                this.data.slug = slug;
                return slug;
            },
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
                axios.put(`/admin/page/${this.item.id}`, this.data)
                    .then(() => {
                        this.$alertify.success("Page Updated Successfully!");
                        this.$nextTick(() => {
                            window.location.href = '/admin/page';
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
