
<div slot="view-body" class="view-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Height:</label>
        </div>
        <div class="col-md-9">
             <p v-text=""></p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Weight:</label>
        </div>
        <div class="col-md-9">

        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood Type:</label>
        </div>
        <div class="col-md-9">

        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood Pressure:</label>
        </div>
        <div class="col-md-9">

        </div>
    </div>
</div>

<div slot="edit-body" class="edit-form">
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Height:</label>
        </div>
        <div class="col-md-9">
             <input type="text" class="form-control input-sm">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Weight:</label>
        </div>
        <div class="col-md-9">
            <input type="number" class="form-control input-sm">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood Type:</label>
        </div>
        <div class="col-md-9">
            <multi-select placeholder="Select Blood Type"
                :close-on-select="true"
                :hide-selected="false"
                :data="defaults.blood_types">
            </multi-select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3 label-col">
            <label>Blood Pressure:</label>
        </div>
        <div class="col-md-9">
            <input type="text" class="form-control input-sm">
        </div>
    </div>
</div>
