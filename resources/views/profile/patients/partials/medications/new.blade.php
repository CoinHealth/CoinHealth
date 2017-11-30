<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">New Medication</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="form-label col-md-3">Medication Name</label>
                        <div class="col-md-9">
                            <v-select label="generic_name" 
                                v-model="form.medication_name"
                                :debounce="500" 
                                :on-search="getMedicationsName" 
                                :options="medications" 
                                placeholder="Search medication name">
                            </v-select>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label col-md-3">SIG</label>
                        <div class="col-md-9">
                            <sig-builder v-model="form.sig"></sig-builder>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label col-md-3">Note to Pharmacy</label>
                        <div class="col-md-9">
                            <v-textarea
                                v-model="form.pharmacy_note"
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
                            <input type="text" 
                                v-model="form.dispense" 
                                placeholder="Dispense" 
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Refills</label>
                            <input type="text" 
                                v-model="form.refills"
                                placeholder="Refills" 
                                class="form-control">
                        </div>
                        <div class="col-md-3 text-center">
                            <label>DAW</label>
                            <div>
                                <toggle-button :width="100" 
                                    @change="toggleDaw"
                                    :sync="true"
                                    :value="form.daw"
                                    :labels="defaults.toggle_button.labels" 
                                    :color="defaults.toggle_button.colors">
                                </toggle-button>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label col-md-3">Indication</label>
                        <div class="col-md-9">
                            <v-textarea
                                v-model="form.indication"
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
                            <date-picker :bootstrap-styling="true" 
                                v-model="form.start_date"
                                input-class="form-control" 
                                :calendar-button="true" 
                                format="yyyy-MM-dd">    
                            </date-picker>
                        </div>
                        <div class="col-md-3">
                            <label>End Date</label>
                            <date-picker :bootstrap-styling="true" 
                                v-model="form.end_date"
                                input-class="form-control" 
                                :calendar-button="true" 
                                format="yyyy-MM-dd">    
                            </date-picker>
                        </div>
                        <div class="col-md-3 text-center">
                            <label>PRN</label>
                            <div>
                                <toggle-button :width="100" 
                                    @change="togglePrn"
                                    :sync="true"
                                    :value="form.prn"
                                    :labels="defaults.toggle_button.labels" 
                                    :color="defaults.toggle_button.colors">
                                </toggle-button>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group">
                        <label class="form-label col-md-3">Internal Notes</label>
                        <div class="col-md-9">
                            <v-textarea
                                v-model="form.internal_notes"
                                rows="2"
                                :limit="255"
                                classes="no-resize form-control">
                            </v-textarea>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label col-md-3">Status</label>
                        <div class="col-md-9">
                            <toggle-button :width="100" 
                                @change="toggleActive"
                                :sync="true"
                                :value="form.active"
                                :labels="defaults.toggle_button.labelActive" 
                                :color="defaults.toggle_button.colors" >
                            </toggle-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="panel-footer text-right">
        <button type="button" 
            class="btn btn-default" 
            @click="menuNew = false">
            Cancel    
        </button>

        <button type="button" 
            class="btn btn-primary" 
            @click="create">
            Save <i class="fa fa-ok"></i>    
        </button>
    </div>
</div>