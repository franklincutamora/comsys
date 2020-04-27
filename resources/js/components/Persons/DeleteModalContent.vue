<template>
    <div>
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="modalTitle">Confirm Delete</h5>
            <button
                type="button"
                class="close text-white"
                data-dismiss="modal"
                aria-label="Close"
            >
                <span class="fa fa-remove" aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure to delete this record?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
            >
                Cancel
            </button>
        </div>
    </div>
</template>
<script>
export default {};
</script>
