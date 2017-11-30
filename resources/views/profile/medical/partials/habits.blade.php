
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Health Status:</label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.habits.health_status"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Exercise Frequency:</label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.habits.exercise_frequency"></span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Exercise:</label>
        </div>
        <div class="col-md-9">
            <span v-text="patient.habits.type_of_exercise"></span>
        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
<!--     <span v-text="patient.habits.health_status" ></span>
    <input type="text" class="form-control" v-model="patient.habits.health_status" name="">

    <span v-text="form.habits.health_status"></span>
    <input type="text" class="form-control" v-model="form.habits.health_status" name=""> -->
    
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Do you consider your health to be:</label>
        </div>
        <div class="col-md-9">
            <select-default classes="form-control input-sm" :options="defaults.habits" v-model="form.habits.health_status" ></select-default>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>How often do you exercise (If you exercise, what do you do?):</label>
        </div>
        <div class="col-md-9">
            <select-default exclude="Never" classes="form-control input-sm"  :options="defaults.exercises" v-model="form.habits.exercise_frequency">
                <input placeholder="For how long and what kind of exercise?" type="text" class="form-control input-sm" v-model="form.habits.type_of_exercise">
            </select-default>
        </div>
    </div>

</div>
