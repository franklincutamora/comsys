<template>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Example Component</div>
                <div class="card-body">
                    I'm an example component mounted via VueJs.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
