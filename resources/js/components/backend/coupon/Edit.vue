<template>
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4 class="m-t-0 header-title">Information</h4>
                    <div class="card-box ">
                        <div class="card-box form-row">
                            <div class="form-group col-md-4">
                                <label for="code" class="col-form-label">Code</label>
                                <input
                                    type="text"
                                    v-model="data.code"
                                    class="form-control"
                                    id="code"
                                    placeholder="Enter Code"
                                >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Value" class="col-form-label">Value</label>
                                <input
                                    type="text"
                                    v-model="data.value"
                                    class="form-control"
                                    placeholder="Enter Value"
                                >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="type" class="col-form-label">Type</label>
                                <select
                                    v-model="data.type"
                                    class="form-control"
                                >
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date" class="col-form-label">From</label>
                                <datepicker
                                    placeholder="mm/dd/yyyy"
                                    v-model="data.dateFrom"
                                ></datepicker>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date" class="col-form-label">To</label>
                                <datepicker
                                    placeholder="mm/dd/yyyy"
                                    v-model="data.dateTo"
                                ></datepicker>
                            </div>
                        </div>
                        <div class=" mt-5 pt-5 ">
                            <div class="text-right mt-5 pt-5">
                                <button
                                    type="submit"
                                    @click="update"
                                    class="btn btn-primary"
                                >
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <button
                                    @click="cancel"
                                    class="btn btn-danger"
                                >
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vue2-datepicker';
    import 'vue2-datepicker/index.css';
    import moment from 'moment';

    export default {
        name: "Edit",
        props: ['coupon'],
        components: {
            Datepicker
        },
        data() {
            return {
                data: this.coupon,
                date: new Date(),
                required: {
                    'code': "Code",
                    'value': "Value",
                    'type': "Type",
                    'dateFrom': "From",
                    'dateTo': "To",
                },
            }
        },
        created() {
            this.data.dateFrom = moment(this.data.dateFrom).toDate();
            this.data.dateTo = moment(this.data.dateTo).toDate();
        },
        methods: {
            update() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                axios.put(`/admin/coupon/${this.data.id}`, this.data)
                    .then(() => {
                        this.$alertify.success('Coupon updated successfully');
                        this.$nextTick(() => {
                            window.location.href = '/admin/coupon';
                        })
                    }).catch(console.log)
            },
            cancel() {
                this.$nextTick(() => {
                    window.location.href = '/admin/coupon';
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
