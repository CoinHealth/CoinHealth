<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Job Title:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode" v-cloak>@{{ crmFields.job_title }}</p>
        <div class="form-group" v-cloak v-show="editMode">
            <select name="crm_fields[job_title]"
                v-model="crmFields.job_title"
                class="form-control">
                <option>Provider/Staff (Hospital)</option>
                <option>Provider/Staff (Private)</option>
                <option>Patients/Interview Candidate</option>
                <option>Educator/Student</option>
                <option>API/Developer</option>
                <option>Other</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
<div class="col-md-3 col-sm-3 col-xs-5 qlabel">
    <p>Contact Number:</p>
</div>
<div class="col-md-9 col-sm-9 col-xs-7 ans">
    <p v-show="!editMode" v-cloak>@{{ crmFields.contact }}</p>
    <div class="form-group" v-show="editMode">
        <input v-model="crmFields.contact"
        type="text"
        name="crm_fields[contact]"
        class="form-control">
    </div>
</div>
</div>

<div class="row">
<div class="col-md-3 col-sm-3 col-xs-5 qlabel">
    <p>Email Address:</p>
</div>
<div class="col-md-9 col-sm-9 col-xs-7 ans">
    <p v-show="!editMode" v-cloak></p>
    <div class="form-group" v-show="editMode">
        <input
        type="text"
        name="email"
        class="form-control">
    </div>
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-5 qlabel">
    <p>Affiliation:</p>
</div>
<div class="col-md-9 col-sm-9 col-xs-7 ans">
    <p v-show="!editMode">@{{ crmFields.affiliation }}</p>
    <div class="form-group" v-show="editMode">
        <input type="text"
        v-model="crmFields.affiliation"
        name="crm_fields[affiliation]"
        class="form-control">
    </div>

</div>
</div>
