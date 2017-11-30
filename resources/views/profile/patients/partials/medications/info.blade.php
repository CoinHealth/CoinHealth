<div slot="view-body" class="view-form">
    <p>
        <label>SIG</label>
        <span v-text="medication.sig"></span>
    </p>
    <p>
        <label>Dispense</label>
        <span v-text="medication.dispense"></span>
    </p>
    <p>
        <label>Refills</label>
        <span v-text="medication.refills"></span>
    </p>
    <div class="row">
        <div class="col-xs-6">
            <label>DAW</label>
            <span>
                <i :class="['fa', checkify(medication.daw)]"></i>
            </span>
        </div>
        <div class="col-xs-6">
            <label>PRN</label>
            <span>
                <i :class="['fa', checkify(medication.prn)]"></i>
            </span>
        </div>
    </div>
    <p v-if="medication.pharmacy_note">
        <label>Pharmacy Note</label>
        <span v-text="medication.pharmacy_note"></span>
    </p>
    <p v-if="medication.pharmacy_note">
        <label>Indication</label>
        <span v-text="medication.pharmacy_note"></span>
    </p>
    <p>
        <label>Start Date</label>
        <span v-text="medication.start_date"></span>
    </p>
    <p>
        <label>Internal Notes</label>
        <span v-text="medication.internal_notes"></span>
    </p>
</div>

<div slot="edit-body" class="edit-form form-horizontal">
    <div class="form-group">
        <label class="form-label col-md-3">Medication Name</label>
        <div class="col-md-9">
            <v-select label="generic_name" :value.sync="medication.medication_name" :debounce="500" :on-search="getMedicationsName" :options="medications" placeholder="Search medication name">
            </v-select>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">SIG</label>
        <div class="col-md-9">
            <sig-builder :value="medication.sig"></sig-builder>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Note to Pharmacy</label>
        <div class="col-md-9">
            <v-textarea
                v-model="medication.pharmacy_note"
                model="internal_notes"
                @update:pharmacy_note="medication.pharmacy_note = $event"
                :value="medication.pharmacy_note"
                rows="2"
                :limit="255"
                classes="no-resize form-control">
            </v-textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <label>Dispense</label>
            <input type="text" :value="medication.dispense" placeholder="First name" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Refills</label>
            <input type="text" :value="medication.refills" placeholder="Middle name" class="form-control">
        </div>
        <div class="col-md-3 text-center">
            <label>DAW</label>
            <div>
                <toggle-button :width="100" :labels="defaults.toggle_button.labels" :color="defaults.toggle_button.colors" :value="Boolean(medication.daw)"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="form-label col-md-3">Indication</label>
        <div class="col-md-9">
            <v-textarea
                v-model="medication.indication"
                model="internal_notes"
                @update:indication="medication.indication = $event"
                :value="medication.indication"
                rows="2"
                :limit="255"
                classes="no-resize form-control">
            </v-textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-3"></div>
        <div class="col-md-3">
            <label>Start Date</label>
            <date-picker :bootstrap-styling="true" input-class="form-control" :calendar-button="true" format="yyyy-MM-dd" :value="medication.start_date"></date-picker>
        </div>
        <div class="col-md-3">
            <label>End Date</label>
            <date-picker :bootstrap-styling="true" input-class="form-control" :calendar-button="true" format="yyyy-MM-dd" :value="medication.end_date"></date-picker>
        </div>
        <div class="col-md-3 text-center">
            <label>PRN</label>
            <div>
                <toggle-button :width="100" :labels="defaults.toggle_button.labels" :color="defaults.toggle_button.colors" :value="Boolean(medication.prn)"/>
            </div>
        </div>
    </div>


    <div class="form-group">
        <label class="form-label col-md-3">Internal Notes</label>
        <div class="col-md-9">
            <v-textarea
                v-model="medication.internal_notes"
                @update:internal_notes="medication.internal_notes = $event"
                :value="medication.internal_notes"
                rows="2"
                :limit="255"
                classes="no-resize form-control">
            </v-textarea>
        </div>
    </div>

    <div class="form-group">
        <label class="form-label col-md-3">Status</label>
        <div class="col-md-9">
            <toggle-button :width="100" :labels="defaults.toggle_button.labelActive" :color="defaults.toggle_button.colors" :value="Boolean(medication.active)"/>
        </div>
    </div>
</div>
