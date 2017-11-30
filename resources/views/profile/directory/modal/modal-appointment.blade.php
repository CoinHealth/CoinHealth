<div class="modal fade modal-blue" id="modal-set-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Set an Appointment
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-setting" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <label class="alert-label"></label>
                            </div>
                            <form action="">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" disabled class="form-control" id="physician_name">
                                </div>

                                <div class="form-group">
                                    <label for="">Reason for visit</label>
                                    <textarea rows="3" maxlength="250" class="no-resize form-control" name="reason"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Schedule</label>
                                    <input type="datetime-local" class="form-control datepicker" name="date">
                                </div>
                                 <div class="form-group">
                                    <label for="">Doctor's Address</label>
                                    <select name="provider_id" class="form-control"></select>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="button" class="btn btn-primary btnDoneSetAppointment">Done</button>
                </div>
            </div>
        </div>
    </div>