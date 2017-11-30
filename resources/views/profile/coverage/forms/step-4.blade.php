<div class="fourth">
    <h2 class="text-center">Perfect!</h2>
    <p>
        We’ll send the bill directly to you
        for care you received.
    </p>
    <div class="card-wrapper col-md-8 col-md-push-2">
        <div class="row">
            <div class="col-md-6">
                <p class="card-label">Firstname</p>
                <p class="card-value"
                    v-text="form.careparrot.first_name">
                </p>
            </div>
            <div class="col-md-6">
                <p class="card-label">Lastname</p>
                <p class="card-value"
                    v-text="form.careparrot.last_name">
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="card-label">Date of Birth</p>
                <p class="card-value"
                    v-text="form.careparrot.dob">
                </p>
            </div>
            <div class="col-md-6">
                <p class="card-label">Gender</p>
                <p class="card-value"
                    v-text="form.careparrot.gender">
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p class="card-label">Email</p>
                <p class="card-value"
                    v-text="form.careparrot.email">
                </p>
            </div>
            <div class="col-md-6">
                <p class="card-label">Emergency Contact</p>
                <p class="card-value"
                    v-text="form.insurance.contact">
                </p>
            </div>
        </div>
    </div>
    <button @click="step = 5" type="button" class="btn btn-lg btn-next">
        Next
    </button>
</div>
