<template>
    <div>
        <FileUpload
            :token="token"
            label="Drop Product"
            :myFiles="myFiles"
            max_file_size="1MB"
            :allow_multiple="true"
            accept_file_types="image/jpeg, image/png"
            @process="onProcess"
        />
    </div>
</template>

<script>
    import FileUpload from "./FileUpload";

    export default {
        name: "Test",
        props:['token'],
        components: {FileUpload},
        data: function () {
            return {
                myFiles: "Temp/UsxwCIm4HcWXIq8MaSq3WSEZsEjkXJIHvNKkqu0S.jpeg"
            }
        },
        methods: {
            onProcess(data) {
                console.log(data);
            },
        }
    }
</script>

<style scoped>

</style>
