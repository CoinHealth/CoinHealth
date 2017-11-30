
<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>SSN:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode">@{{ patient.ssn }}</p>
        <div class="form-group" v-show="editMode">
            <input type="text" v-model="patient.ssn" class="form-control numberOnly">
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Date of Birth:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode">@{{ patient.dob | birthday }}</p>
        <div class="form-group" v-show="editMode">
            <input type="date" v-model="patient.dob" class="form-control">
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Gender:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode">@{{ patient.gender }}</p>
        <div class="form-group" v-show="editMode">
            <select name="gender" v-model="patient.gender" class="form-control">
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Marital Status:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode">@{{ patient.marital_status }}</p>
        <div class="form-group" v-show="editMode">
            <select name="marital_status" v-model="patient.marital_status" class="form-control">
                <option v-for="status in defaults.marital_status">@{{ status }}</option>
            </select>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
        <p>Race:</p>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-7 ans">
        <p v-show="!editMode">@{{ patient.race }}</p>
        <div class="form-group" v-show="editMode">
            <select name="race" v-model="patient.race" class="form-control">
                <option v-for="race in defaults.races">@{{ race }}</option>
            </select>
        </div>
    </div>
</div>

<div v-show="seeAll">
    <!-- CURRENT ADDRESS -->
    <h5>Current Address</h5>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Street:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.street_1 }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.current_address.street_1"
                    class="form-control">
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>City:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.city }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.current_address.city"
                    class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>State:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.state }}</p>
            <div class="form-group" v-show="editMode">
                <!-- <input type="text"
                    v-model="patient.current_address.state"
                    class="form-control"> -->
                <select v-model="patient.current_address.state" class="form-control">
                    <option v-for="state in defaults.states">@{{ state }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Zip Code:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.current_address">@{{ patient.current_address.zip }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.current_address.zip"
                    class="form-control numberOnly">
            </div>
        </div>
    </div>

    <!-- MAILING ADDRESS -->
    <h5>Mailing Address</h5>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Street:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.current_address">@{{ patient.billing_address.street_1 }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.billing_address.street_1"
                    class="form-control">
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>City:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.billing_address">@{{ patient.billing_address.city }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.billing_address.city"
                    class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>State:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.billing_address">@{{ patient.billing_address.state }}</p>
            <div class="form-group" v-show="editMode">
                <!-- <input type="text"
                    v-model="patient.billing_address.state"
                    class="form-control"> -->
                <select v-model="patient.billing_address.state" class="form-control">
                    <option v-for="state in defaults.states">@{{ state }}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Zip Code:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-if="patient.billing_address">@{{ patient.billing_address.zip }}</p>
            <div class="form-group" v-show="editMode">
                <input type="text"
                    v-model="patient.billing_address.zip"
                    class="form-control numberOnly">
            </div>
        </div>
    </div>
    <h5>Contact Information</h5>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Email:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode">@{{ patient.email }}</p>
            <div class="form-group" v-show="editMode">
                <input type="email" v-model="patient.email" class="form-control">
            </div>
        </div>
    </div>
    <!-- CONTACT NUMBERS -->
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Home Phone:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.contact_home }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.contact_home"
                type="text"
                class="form-control numberOnly">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Cell Number:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.contact_cell }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.contact_cell"
                type="text"
                class="form-control numberOnly">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Work Number:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.contact_work }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.contact_work"
                type="text"
                class="form-control numberOnly">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Preferred Method of Communication:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode">@{{ patient.preferred_communication }}</p>
            <div class="form-group" v-show="editMode">
                <select name="preferred_communication" v-model="patient.preferred_communication" class="form-control">
                    <option v-for="communication in defaults.communications">@{{ communication }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Employer:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.employer }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.employer"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Spouse Name:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.spouse_name }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.spouse_name"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Spouse Date of Birth:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.spouse_dob }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.spouse_dob"
                type="date"
                class="form-control">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Responsible Party:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode">@{{ patient.responsible_party }}</p>
            <div class="form-group" v-show="editMode">
                <select name="responsible_party" v-model="patient.responsible_party" class="form-control">
                    <option v-for="party in defaults.responsible_parties">@{{ party }}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>If patient is a minor, are parents:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode">@{{ patient.parent_status }}</p>
            <div class="form-group" v-show="editMode">
                <select name="parent_status" v-model="patient.parent_status" class="form-control">
                    <option v-for="status in defaults.parent_status">@{{ status }}</option>
                </select>
            </div>
        </div>
    </div>

    <h5>For Emergency</h5>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Contact Person:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.emergency_contact_person }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.emergency_contact_person"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Contact Number:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.emergency_contact_no }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.emergency_contact_no"
                type="text"
                class="form-control numberOnly">
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Relationship to Patient:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode">@{{ patient.emergency_contact_relation }}</p>
            <div class="form-group" v-show="editMode">
                <select name="emergency_contact_relation" v-model="patient.emergency_contact_relation" class="form-control">
                    <option v-for="relation in defaults.relations">@{{ relation }}</option>
                </select>
            </div>
        </div>
    </div>

    <h5>If applicable</h5>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Referring Physician:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.referring_physician }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.referring_physician"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Primary Care Physician:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.primary_care_physician }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.primary_care_physician"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3 col-sm-3 col-xs-5 qlabel">
            <p>Pharmacy:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-7 ans">
            <p v-show="!editMode" v-cloak>@{{ patient.pharmacy }}</p>
            <div class="form-group" v-show="editMode">
                <input v-model="patient.pharmacy"
                type="text"
                class="form-control">
            </div>
        </div>
    </div>

</div>

<a href="javascript:void(0);" class="small btn-link" @click="toggleSeeMore">@{{ seemore }}</a>
