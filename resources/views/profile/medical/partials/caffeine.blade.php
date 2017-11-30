
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Drink caffeine:</label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.caffeine.drinking"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Glasses a day:</label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.caffeine.number_of_glasses"></span>
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you consume drinks with caffeine (coffee tea, soda drinks)? (If yes, how many drinks each day?)</label>
        </div>
        <div class="col-md-9">
            <select-default match-value="Yes" classes="form-control input-sm"  v-model="form.caffeine.drinking" :options="defaults.yesno" >
                <input placeholder type="text" class="form-control input-sm" v-model="form.caffeine.number_of_glasses">
            </select-default>
        </div>
    </div>
   
</div>
