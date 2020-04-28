<template>
    <div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="fname">First Name</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="fname"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.fname"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="mname">Middle Name</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="mname"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.mname"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="lname">Last Name</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="lname"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.lname"
                />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="suffix">Suffix</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="suffix"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.suffix"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="fname">Nickname</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="nname"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.nname"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="bday">Age</label>
                <input
                    type="text"
                    class="form-control"
                    name="bday"
                    readonly
                    aria-readonly="true"
                    :value="age + ' Years Old'"
                />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="cstatus">Civil Status</label>
                <input
                    type="text"
                    class="form-control"
                    name="cstatus"
                    readonly
                    aria-readonly="true"
                    :value="civilStatus"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="occupation">Occupation</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="occupation"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.occupation"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="lstatus">Living Status</label>
                <input
                    type="text"
                    class="form-control text-capitalize"
                    name="lstatus"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.lstatus"
                />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="mobnum">Mobile Number </label>
                <input
                    type="text"
                    class="form-control"
                    name="mobnum"
                    readonly
                    aria-readonly="true"
                    :value="personDetails.mobnum"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="occupation">Registered On:</label>
                <input
                    type="text"
                    class="form-control"
                    name="occupation"
                    readonly
                    aria-readonly="true"
                    :value="registeredOn"
                />
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["personDetails", "age", "civilStatus", "registeredOn"]
};
</script>
