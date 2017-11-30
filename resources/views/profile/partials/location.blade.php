<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>Street:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode">@{{ crmFields.location.street_1 }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="crmFields.location.street_1"
                class="form-control">
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-3">
        <p>City:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-9">
        <p v-show="!editMode">@{{ crmFields.location.city }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="crmFields.location.city"
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
        <p v-show="!editMode">@{{ crmFields.location.state }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="crmFields.location.state"
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
        <p v-show="!editMode">@{{ crmFields.location.zip }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text"
                v-model="crmFields.location.zip"
                name="crm_fields[location][zip_code]"
                class="form-control">
        </div>
    </div>
</div>
