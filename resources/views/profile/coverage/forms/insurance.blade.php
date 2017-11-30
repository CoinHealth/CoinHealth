<h5>Insurance</h5>

<div class="insurance-wrapper primary-insurance">
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header form-header">
            <p>Primary Insurance Provider:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.provider_name">    
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <select class="form-control"
                    v-model="form.insurance.provider_name">
                    <option disabled>Select Insurance Provider</option>
                    <option>Aetna</option>
                    <option>Blue Shield of California</option>
                    <option>Cigna Health Insurance</option>
                    <option>United Health Care</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Policy No.:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.policy_no">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.policy_no">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Insured Name:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.insured_name">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.insured_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Group No.:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.group_no">    
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.group_no">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Insured DOB:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.insured_dob">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="date"
                    class="form-control"
                    v-model="form.insurance.insured_dob">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Relationship to Patient:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode"
                v-cloak 
                v-text="coverage.insurance.relationship">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.relationship">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Email:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.email">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header ">
            <p>Contact:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.insurance.contact">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.insurance.contact">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>ID:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">

            <p v-show="!editMode" v-cloak>
                <img class="insurance-card" 
                    :src="primaryInsuranceCardPath" 
                    alt="">
            </p>
            <div class="form-group" v-cloak v-if="editMode">

                <picture-input
                    ref="pictureInputPrimaryInsurance"
                    @change="changePrimaryInsuranceId"
                    width="250"
                    height="250"
                    margin="5"
                    :prefill="formPrimaryInsuranceCardPath"
                    accept="image/*"
                    size="2"
                    :custom-strings="{upload: 'Upload', drag: 'Upload'}"
                    button-class="btn btn-primary btn-xs">
                </picture-input>

            </div>
        </div>
    </div>
</div>

<hr />
{{-- Secondary Insurance --}}

<div class="insurance-wrapper primary-insurance">
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header form-header">
            <p>Secondary Insurance Provider:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.provider_name">    
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <select class="form-control"
                    v-model="form.secondary_insurance.provider_name">
                    <option disabled>Select Insurance Provider</option>
                    <option>Aetna</option>
                    <option>Blue Shield of California</option>
                    <option>Cigna Health Insurance</option>
                    <option>United Health Care</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Policy No.:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.policy_no">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.policy_no">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Insured Name:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.insured_name">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.insured_name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Group No.:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.group_no">    
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.group_no">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Insured DOB:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.insured_dob">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="date"
                    class="form-control"
                    v-model="form.secondary_insurance.insured_dob">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Relationship to Patient:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode"
                v-cloak 
                v-text="coverage.secondary_insurance.relationship">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.relationship">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>Email:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.email">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.email">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header ">
            <p>Contact:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
            <p v-show="!editMode" 
                v-cloak 
                v-text="coverage.secondary_insurance.contact">
            </p>
            <div class="form-group" v-cloak v-show="editMode">
                <input type="text"
                    class="form-control"
                    v-model="form.secondary_insurance.contact">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3  col-xs-3 form-header">
            <p>ID:</p>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
        
            <p v-show="!editMode" v-cloak>
                <img class="insurance-card" 
                    :src="secondaryInsuranceCardPath" 
                    alt="">
            </p>
            <div class="form-group" v-cloak v-if="editMode">
                <picture-input
                    ref="pictureInputSecondaryInsurance"
                    @change="changeSecondaryInsuranceId"
                    width="250"
                    height="250"
                    margin="5"
                    :prefill="formSecondaryInsuranceCardPath"
                    accept="image/*"
                    size="2"
                    :custom-strings="{upload: 'Upload', drag: 'Upload'}"
                    button-class="btn btn-primary btn-xs">
                </picture-input>
            </div>
        </div>
    </div>
</div>