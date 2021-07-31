<template>
    <tr>
        <td>
            <select2
                v-model="data.make_id"
                @change="fetchModel"
                :options="makes"
                :settings="{placeholder:'Please Select Make'}"
            ></select2>
        </td>
        <td>
            <select2
                v-model="data.models_id"
                :options="models"
                :settings="{placeholder:'Please Select Model'}"
            ></select2>
        </td>
        <td>
            <select2
                v-model="data.year_id"
                :options="years"
                :settings="{placeholder:'Please Select Year'}"
            ></select2>
        </td>
        <td>
            <select2
                v-model="data.mileage_id"
                :options="mileages"
                :settings="{placeholder:'Please Select Mileage'}"
            ></select2>
        </td>
        <td>
            <button
                @click="remove"
                type="button"
                class="close "
                aria-label="Close">
            <span
                aria-hidden="true"
                id="delete_1"
                class="fas text-danger fa-trash-alt">
                                                    </span>
            </button>
        </td>
    </tr>

</template>

<script>
    export default {
        name: "EditRelation",
        props: ['makes', 'years', 'mileages', 'relation'],
        data() {
            return {
                data: {},
                required: {
                    'make_id': "Make",
                    'models_id': "Model",
                    'year_id': "Year",
                    'mileage_id': "Mileage",
                },
                models: []
            }
        },
        created() {
            this.fetchModel(this.relation.make_id)
            setTimeout(() => {
                this.data = this.relation
            }, 500)

        },
        methods: {
            remove() {
                this.$emit('remove')
            },
            getRelation() {
                for (let input in this.required) {
                    if (this.data[input] === '') {
                        this.$alertify.error(`${this.required[input]} is required`);
                        return false;
                    }
                }
                this.$emit('data', this.data)
            },
            fetchModel(makeId) {
                axios.get(`/admin/smart_assistant/${makeId}/models`)
                    .then((res) => {
                        this.models = res.data.models
                    }).catch(console.log)
            },
        }
    }
</script>

<style scoped>

</style>
