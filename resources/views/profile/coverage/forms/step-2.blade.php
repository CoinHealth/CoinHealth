<div class="second">
    <p v-text="insurance"></p>
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <div class="form-group">
                <label class="form-label">First Name</label>
                <input class="form-control" type="text" v-model="form.insurance.first_name">
            </div>
            <div class="form-group">
                <label class="form-label">Last Name</label>
                <input class="form-control" type="text" v-model="form.insurance.last_name">
            </div>
            <div class="form-group">
                <label class="form-label">ID</label>
                <input class="form-control" type="text" v-model="form.insurance.id">
            </div>
            <div class="form-group">
                <label class="form-label">Contact</label>
                <input class="form-control" type="text" v-model="form.insurance.contact">
            </div>
            <button type="button" @click="step = 3" class="btn btn-lg btn-next">
                Next
            </button>
        </div>
    </div>
</div>
