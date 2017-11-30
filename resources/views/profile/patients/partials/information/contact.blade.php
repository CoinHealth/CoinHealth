<div slot="view-body" class="view-form">
    <p>
        <label>Home Phone</label>
        <span v-text="data.contactInfo.contact_home"></span>
    </p>
    <p>
        <label>Cell No.</label>
        <span v-text="data.contactInfo.contact_cell"></span>
    </p>
    <p>
        <label>Work</label>
        <span v-text="data.contactInfo.contact_work"></span>
    </p>
    <p>
        <label>Email</label>
        <span v-text="data.contactInfo.email"></span>
    </p>
    <h5>Emergency Contact</h5>
    <p>
        <label>Name</label>
        <span v-text="data.contactInfo.emergency_contact_person"></span>
    </p>
    <p>
        <label>Phone No.</label>
        <span v-text="data.contactInfo.emergency_contact_no"></span>
    </p>
    <p>
        <label>Relation</label>
        <span v-text="data.contactInfo.emergency_contact_relation"></span>
    </p>
    <p>
        <label>Patient Notes</label>
        <span v-text="data.contactInfo.patient_notes"></span>
    </p>
</div>
<div slot="edit-body" class="edit-form form-horizontal">
    <div class="form-group">
        <label class="form-label col-md-3">Home Phone No.</label>
        <div class="col-md-9">
            <input maxlength="20" type="text" class="form-control" v-model="data.contactInfo.contact_home">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Cell Phone No.</label>
        <div class="col-md-9">
            <input  maxlength="20" type="text" class="form-control" v-model="data.contactInfo.contact_cell">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Work Phone No.</label>
        <div class="col-md-9">
            <input  maxlength="20" type="text" class="form-control" v-model="data.contactInfo.contact_work">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Email</label>
        <div class="col-md-9">
            <input maxlength="150" type="text" class="form-control" v-model="data.contactInfo.email">
        </div>
    </div>
    <h5>Emergency</h5>
    <div class="form-group">
        <label class="form-label col-md-3">Emergency Contact Name</label>
        <div class="col-md-9">
            <input maxlength="100" type="text" class="form-control" v-model="data.contactInfo.emergency_contact_person">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Emergency Phone Number</label>
        <div class="col-md-9">
            <input maxlength="100" type="text" class="form-control" v-model="data.contactInfo.emergency_contact_no">
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Emergency Contact Relation</label>
        <div class="col-md-9">
            <select class="form-control" v-model="data.contactInfo.emergency_contact_relation">
                <option v-for="relation in defaults.relations">@{{ relation }}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Patient Notes</label>
        <div class="col-md-9">
            <v-textarea
                v-model="data.contactInfo.patient_notes"
                @update:patient_notes="data.contactInfo.patient_notes = $event"
                model="patient_notes"
                :value="data.contactInfo.patient_notes"
                rows="3"
                :limit="255"
                classes="no-resize form-control">
            </v-textarea>
        </div>
    </div>
</div>
