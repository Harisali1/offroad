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
        name: "AddRelation",
        props: ['makes', 'years', 'mileages'],
        data: () => ({
            data: {
                make_id: '',
                models_id: '',
                year_id: '',
                mileage_id: ''
            },
            required: {
                'make_id': "Make",
                'models_id': "Model",
                'year_id': "Year",
                'mileage_id': "Mileage",
            },
            models: []
        }),
        methods: {
            remove(){
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
            fetchModel() {
                axios.get(`/admin/smart_assistant/${this.data.make_id}/models`)
                    .then((res) => {
                        this.models = res.data.models
                    }).catch(console.log)
            },
        }
    }
</script>

<style scoped>

</style>
