<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12 ">
                    <div class="card-box">
                        <h4 class="m-t-0 header-title">Model Information</h4>
                        <div class="card-box">
                            <div class="">
                                <div class="form-group col-md-12">
                                    <label for="title" class="col-form-label"> Title</label>
                                    <input
                                        type="text"
                                        v-model="data.title"
                                        class="form-control"
                                        id="title"
                                        placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="Type" class="col-form-label"> Type</label>
                                <select2
                                    v-model="data.type"
                                    :options="types"
                                    :settings="{placeholder: 'Please Select Type'}"
                                ></select2>
                            </div>
                            <div class=" form-group col-md-12">
                                <label for="Type" class="col-form-label"> Make</label>
                                <select2
                                    v-model="data.make_id"
                                    :options="makes"
                                    :settings="{placeholder: 'Please Select Make'}"
                                ></select2>
                            </div>
                        </div>
                        <div class="text-right">
                            <button
                                @click="update"
                                class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
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
        props: ['models', 'makes'],
        data() {
            return {
                data: this.models,
                required: {
                    'title': "Title",
                    'type': "Type",
                    'make_id': "Make",
                },
                types: [
                    'Cars',
                    'SUV',
                    'Van',
                    'Bus',
                    'Dumper',
                    'Jeep',
                    'HatchBack',
                    'Truck',
                    'Wagon',
                    'Coupe',
                    'Commuteer',
                    'Sedan',
                ]
            }
        },
        methods: {
            update() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.put(`/admin/model/${this.data.id}`, this.data)
                    .then(() => {
                        this.$alertify.success('Model Updated successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/model';
                        })
                    }).catch(console.log)
            }
            ,
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/model';
                })
            }
        }
    }
</script>
