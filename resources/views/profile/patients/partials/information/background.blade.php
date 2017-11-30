<div slot="view-body" class="view-form">
    <p>
        <label>Name</label>
        <span v-text="name"></span>
    </p>
    <p>
        <label>Gender</label>
        <span v-text="data.backgroundData.gender"></span>
    </p>
    <p>
        <label>Date of Birth</label>
        <span v-text="dob"></span>
    </p>
    <p>
        <label>Current Address</label>
        <span>@{{ data.backgroundData.current_address | addressify }}</span>
    </p>
    <p>
        <label>Billing Address</label>
        <span>@{{ data.backgroundData.billing_address | addressify }}</span>
    </p>
    <p>
        <label>SSN</label>
        <span v-text="data.backgroundData.social_security_no"></span>
    </p>
    <p>
        <label>Marital Status</label>
        <span v-text="data.backgroundData.marital_status"></span>
    </p>
    <p>
        <label>Preferred Language</label>
        <span v-text="lang"></span>
    </p>
    <!-- <p>
        <label>Ethnicity</label>
        <span v-text="data.backgroundData.ethnicity"></span>
    </p> -->
    <p>
        <label>Race</label>
        <span v-text="data.backgroundData.race"></span>
    </p>
</div>
<div slot="edit-body" class="edit-form form-horizontal">
    <div class="form-group">
        <label class="form-label col-md-3">Name</label>
        <div class="col-md-3">
            <label>Firstname</label>
            <input type="text" placeholder="First name" class="form-control" v-model="data.backgroundData.name.first_name">
        </div>
        <div class="col-md-3">
            <label>Middlename</label>
            <input type="text" placeholder="Middle name" class="form-control" v-model="data.backgroundData.name.middle_name">
        </div>
        <div class="col-md-3">
            <label>Lastname</label>
            <input type="text" placeholder="Last name" class="form-control" v-model="data.backgroundData.name.last_name">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Gender</label>
        <div class="col-md-9">
            <select class="form-control" v-model="data.backgroundData.gender">
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Date of Birth</label>
        <div class="col-md-9">
            <input type="date" class="form-control" v-model="data.backgroundData.date_of_birth">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Current Address</label>
        <div class="col-md-9">
            <v-address @update:current_address="updateCurrentAddress" model="current_address" :data="data.backgroundData.current_address"></v-address>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Billing Address</label>
        <div class="col-md-9">
            <v-address @update:billing_address="updateBillingAddress" model="billing_address" :data="data.backgroundData.billing_address"></v-address>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">SSN</label>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="data.backgroundData.social_security_no">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Marital Status</label>
        <div class="col-md-9">
            <select class="form-control" v-model="data.backgroundData.marital_status">
                <option v-for="status in defaults.marital_status">@{{ status }}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Preferred Language</label>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="data.backgroundData.language">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 form-label">Race</label>
        <div class="col-md-9">
            <select class="form-control" v-model="data.backgroundData.race">    
                <option v-for="race in defaults.races">@{{ race }}</option>
            </select>
        </div>
    </div>
</div>
