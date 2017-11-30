<div class="cp-wrapper">
    <h5>CareParrot ID</h5>
    <div class="careparrot-card-container" v-if="!editMode">
        <careparrot-card :careparrot="coverage.careparrot"></careparrot-card>
    </div>
    <div class="clearfix"></div>
    <div class="editmode" v-if="editMode" v-cloak>
        <div class="row"  v-cloak>
            <div class="col-md-3 col-sm-3 col-xs-3  form-header">
                <p>ID Picture:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <picture-input
                        ref="pictureInputCard"
                        @change="changeCardId"
                        width="250"
                        height="250"
                        margin="5"
                        accept="image/*"
                        size="2"
                        :prefill="formCareparrotCardPath"
                        :custom-strings="{upload: 'Upload', drag: 'Upload'}"
                        button-class="btn btn-primary btn-xs">
                    </picture-input>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 form-header">
                <p>First Name:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <input type="text"
                        class="form-control"
                        v-model="form.careparrot.first_name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 form-header">
                <p>Last Name:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <input type="text"
                        class="form-control"
                        v-model="form.careparrot.last_name">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 form-header">
                <p>Date of Birth:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <input type="date"
                        class="form-control"
                        v-model="form.careparrot.dob">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 form-header">
                <p>Email:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <input type="email"
                        class="form-control"
                        v-model="form.careparrot.email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 form-header">
                <p>Gender:</p>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="form-group" v-cloak>
                    <select class="form-control" v-model="form.careparrot.gender">
                        <option value="default" disabled>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
