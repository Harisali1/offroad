<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card-box shadow">
                        <h4 class="m-t-0 header-title">Smart Assistant Information</h4>
                        <div class=" ">
                            <div class="">
                                <div class="form-row mt-3 mb-3">
                                    <div class="form-group col-md-12 ">
                                        <label for="title" class="col-form-label"> Title</label>
                                        <input
                                            type="text"
                                            v-model="data.title"
                                            class="form-control"
                                            id="title"
                                            placeholder="Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="text-right ml-auto mb-2">
                                    <button
                                        v-if="data.relations.length<10"
                                        @click="addRow"
                                        class="btn btn-primary "
                                        id="add-row">
                                        <i class="fas fa-save"></i>
                                        Add
                                    </button>
                                </div>
                                <table class="table border-0" id="myTable">
                                    <thead>
                                    <tr>
                                        <th scope="col" style="width:25%">Make</th>
                                        <th scope="col" style="width:25%">Model</th>
                                        <th scope="col" style="width:25%">Year</th>
                                        <th scope="col" style="width:25%">Mileage</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <EditRelation
                                        v-for="(relation,key) of data.relations"
                                        :key="key"
                                        @data="onData($event,key)"
                                        @remove="removeRow(key)"
                                        ref="relation"
                                        :relation="relation"
                                        :makes="makes"
                                        :years="years"
                                        :mileages="mileages"
                                    ></EditRelation>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="text-right mt-5 pt-5">
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
    import EditRelation from "./EditRelation";

    export default {
        name: "Edit",
        props: ['makes', 'years', 'mileages', 'smart_assistant'],
        components: {EditRelation},
        data() {
            return {
                data: this.smart_assistant,
                required: {
                    'code': "Code",
                    'value': "Value",
                    'type': "Type",
                    'dateFrom': "From",
                    'dateTo': "To",
                },
            }
        },
        methods: {
            onData(data, key) {
                this.data.relations[key] = data
            },
            addRow: function () {
                this.data.relations.push({
                    make_id: '',
                    models_id: '',
                    year_id: '',
                    mileage_id: ''
                });
            },
            removeRow: function (key) {
                this.data.relations.splice(key, 1);
            },
            update() {
                if (this.data.title === '') {
                    this.$alertify.error(`Title is required`);
                    return false;
                }
                if (this.data.relations.length < 1) {
                    this.$alertify.error(`Make Model Year Mileage is required`);
                    return false;
                }
                for (let index in this.data.relations) {
                    if (this.$refs.relation[index].getRelation() === false) {
                        return false;
                    }
                }
                axios.put(`/admin/smart_assistant/${this.data.id}`, this.data)
                    .then(() => {
                        this.$alertify.success('Smart Assistant Updated successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/smart_assistant';
                        })
                    }).catch((err) => {
                    if (err.response.status === 422) {
                        let errors = Object.values(err.response.data.errors);
                        for (let error of errors) {
                            this.$alertify.error(error[0]);
                        }
                    }
                })
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/smart_assistant';
                })
            }
        }
    }
</script>
