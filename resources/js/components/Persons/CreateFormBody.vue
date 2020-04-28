<template>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="fname">
                    First Name
                    <small class="text-primary">required</small>
                </label>
                <input
                    type="text"
                    class="form-control"
                    name="fname"
                    required
                    pattern="[a-zA-Z ]+"
                    title="Alphabet letters only."
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="mname">Middle Name</label>
                <input type="text" class="form-control" name="mname" />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="lname">
                    Last Name
                    <small class="text-primary">required</small>
                </label>
                <input
                    type="text"
                    class="form-control"
                    name="lname"
                    required
                    pattern="[a-zA-Z ]+"
                    title="Alphabet letters only."
                />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="suffix">Suffix</label>
                <select name="suffix" class="form-control">
                    <option value selected>Select</option>
                    <option value="jr">Jr</option>
                    <option value="sr">Sr</option>
                    <option value="II">II</option>
                    <option value="II">III</option>
                    <option value="IV">IV</option>
                    <option value="V">V</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="fname">Nickname</label>
                <input
                    type="text"
                    class="form-control"
                    name="nname"
                    pattern="[a-zA-Z-_ ]+"
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="bday">
                    Birth Date
                    <small class="text-primary">required</small>
                </label>
                <input
                    type="date"
                    class="form-control"
                    name="bday"
                    required
                    placeholder="mm/dd/yyyy"
                />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="cstatus">
                    Civil Status
                    <small class="text-primary">required</small>
                </label>
                <select name="cstatus" class="form-control">
                    <option value="si" selected>Single</option>
                    <option value="ma">Married</option>
                    <option value="wi">Widowed</option>
                    <option value="se">Separated</option>
                    <option value="an">Annulled</option>
                    <option value="di">Divorced</option>
                </select>
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="occupation">Occupation</label>
                <input
                    type="text"
                    class="form-control"
                    name="occupation"
                    pattern="[a-zA-Z ]+"
                    title="Alphabet letters only."
                />
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="lstatus">
                    Living Status
                    <small class="text-primary">required</small>
                </label>
                <select name="lstatus" class="form-control">
                    <option value="alive" selected>Alive</option>
                    <option value="deceased">Deceased</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="mobnum">
                    Mobile Number
                    <small class="text-primary">required</small>
                </label>
                <input
                    type="tel"
                    class="form-control"
                    name="mobnum"
                    required
                    pattern="\d{11}"
                    title="Input 11 digit number."
                />
            </div>
            <upload-photo-component state="Upload"></upload-photo-component>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <div class="float-md-right text-center">
                    <a :href="personsUrl" class="btn btn-primary text-white">
                        <span class="fa fa-arrow-left"></span> Cancel
                    </a>
                    <button type="submit" class="btn btn-success">
                        <span class="fa fa-save"></span> Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["personsUrl"]
};
</script>
