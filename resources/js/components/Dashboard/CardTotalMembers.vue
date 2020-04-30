<template>
    <div class="row justify-content-center mb-medium">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Population Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="lead">Community Members</div>
                            <div>
                                {{ personTotal }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="lead">Officials</div>
                            <div>
                                55
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="lead">Alive</div>
                            <div>
                                56
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["personTotal"]
};
</script>
