<div class="third">
    <p>
        <img src="/images/mascot.png"></img>
    </p>
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input class="form-control" type="text" v-model="form.careparrot.first_name">
            </div>
            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input class="form-control" type="text" v-model="form.careparrot.last_name">
            </div>
            <div class="form-group">
                <label class="form-label">Date of Birth</label>
                <input class="form-control" type="date" v-model="form.careparrot.dob">
            </div>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" v-model="form.careparrot.email">
            </div>
            <div class="form-group">
                <label class="form-label">Gender</label>
                <select class="form-control" v-model="form.careparrot.gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <button type="button" @click="step = 4" class="btn btn-lg btn-next">
                Next
            </button>
        </div>
    </div>
</div>
