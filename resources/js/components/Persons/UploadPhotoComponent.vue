<template>
    <!-- <div class="form-row"> -->
    <div class="form-group col-12 col-md-4">
        <label for="photo">{{ state }} Photo</label>
        <div class="custom-file">
            <input
                type="file"
                class="custom-file-input"
                id="photo"
                name="photo"
                title="2 x 2 profile photo"
                v-on:change="detectFileName"
            />
            <label class="custom-file-label" for="photo">{{ fileName }}</label>
        </div>
    </div>
    <!-- </div> -->
</template>
<script>
export default {
    props: ["state"],

    data() {
        return {
            fileName: "jpeg, jpg, png"
        };
    },
    methods: {
        detectFileName: function(evt) {
            this.fileName = event.target.files[0].name;
        }
    }
};
</script>
