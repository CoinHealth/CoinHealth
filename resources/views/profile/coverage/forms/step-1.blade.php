<div class="first">
    <p>CareParrot Digital ID</p>
    <div class="row">
        <div class="col-md-8 col-md-push-2">
            <label for="aetna" class="btn btn-lg">
                Aetna
                <input v-model="form.insurance.name"
                    name="insurance"
                    value="Aetna"
                    id="aetna"
                    type="radio"
                    class="hidden">
            </label>
            <label for="blue-shield" class="btn btn-lg">
                Blue Shield of California
                <input v-model="form.insurance.name"
                    name="insurance"
                    value="Blue Shield of California"
                    id="blue-shield"
                    type="radio"
                    class="hidden">
            </label>
            <label for="cigna" class="btn btn-lg">
                Cigna Health Insurance
                <input v-model="form.insurance.name"
                    name="insurance"
                    value="Cigna Health Insurance"
                    id="cigna"
                    type="radio"
                    class="hidden">
            </label>
            <label for="united" class="btn btn-lg">
                United Health Care
                <input v-model="form.insurance.name"
                    name="insurance"
                    value="United Health Care"
                    id="united"
                    type="radio"
                    class="hidden">
            </label>
        </div>
    </div>
</div>
