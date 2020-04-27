<template>
    <div>
        <div class="modal-header bg-info text-white">
            <h5 class="modal-title" id="modalTitle">Search Person</h5>
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
            <p>Select criteria to narrow your search.</p>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="keyword"
                        >Keyword
                        <small class="text-primary">required</small></label
                    >
                    <input
                        type="text"
                        class="form-control"
                        name="keyword"
                        required
                        pattern="[a-zA-Z ]+"
                        title="Alphabet letters only."
                    />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="field">Criteria</label>
                    <select name="field" class="form-control">
                        <option value="lname" selected>Last Name</option>
                        <option value="fname">First Name</option>
                        <option value="mname">Middle Name</option>
                        <option value="nname">Nickname</option>
                    </select>
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="orderBy">Sort By</label>
                    <select name="orderBy" class="form-control">
                        <option value="asc" selected>Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Search</button>
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
