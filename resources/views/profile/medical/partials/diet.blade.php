
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Meals a day: </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.meals"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Special Diet: </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.special_diet"></span>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Dairy products consumed(daily): </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.dairy_products"></span>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Lactose intolerant: </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.lactose_intolerant"></span>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Servings of fruits(daily): </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.fruits"></span>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Servings of soy foods(weekly): </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.soy"></span>
        </div>
    </div>

     <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Servings of fish(weekly): </label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.diets.fish"></span>
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How many meals do you consume each day?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="form.diets.meals">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you try to eat a special diet?</label>
        </div>
        <div class="col-md-9">
            <select-default v-model="form.diets.special_diet" classes="form-control input-sm"  :options="defaults.special_diet" >
            </select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>What dairy products do you consume each day? </label>
        </div>
        <div class="col-md-9">
            <select-default v-model="form.diets.dairy_products" classes="form-control input-sm"  :options="defaults.dairy" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Are you lactose intolerant?</label>
        </div>
        <div class="col-md-9">
            <select-default v-model="form.diets.lactose_intolerant" classes="form-control input-sm"  :options="defaults.yesno" >
            </select-default>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How many servings of fruits do you consume each day?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="form.diets.fruits">
            
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How many servings of soy foods do you consume each week?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="form.diets.soy">
           
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How many servings of fish do you consume each week?</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control" v-model="form.diets.fish">
            
        </div>
    </div>

</div>
