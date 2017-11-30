<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Gender:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode">@{{ patient.gender }}</p>
        <div class="form-group" v-show="editMode">
            <select name="gender" v-model="patient.gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>
</div>
<div class="row mt-10">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Date of Birth:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode">@{{ patient.dob | birthday }}</p>
        <div class="form-group" v-show="editMode">
            <input type="date" v-model="patient.dob" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Contact Number:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode" v-cloak>@{{ patient.contact_home }}</p>
        <div class="form-group" v-show="editMode">
            <input v-model="patient.contact_home"
            type="text"
            name="crm_fields[contact]"
            class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Street:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.street_1 }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="patient.current_address.street_1"
                class="form-control">
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>City:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.city }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="patient.current_address.city"
                name="crm_fields[location][city]"
                class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>State:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.state }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="patient.current_address.state"
                name="crm_fields[location][state_code]"
                class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Zip Code:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.zip }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="patient.current_address.zip"
                name="crm_fields[location][zip_code]"
                class="form-control">
        </div>
    </div>
</div>
