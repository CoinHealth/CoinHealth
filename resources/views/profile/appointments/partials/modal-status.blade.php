<div class="modal fade modal-blue" id="modal-update-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Update Appointment Status
                    </h4>
                </div>
                    <form action="/profile/appointments/status" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="alert alert-setting" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <label class="alert-label"></label>
                                    </div> -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="appointment_id">
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="0">Not Confirmed</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="1">Confirmed</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="2">Cancelled</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="3">Arrived</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="4">In Session</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="5">Complete</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="6">Rescheduled</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="status" value="7">No Show</label>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" aria-label="Close" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary btnChange">Change</button>
                        </div>
                </form>
            </div>
        </div>
    </div>