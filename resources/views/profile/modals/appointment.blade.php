<div class="modal fade modal-blue" id="modal-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Confirm Appointment
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
                                <input type="hidden" name="activity_id">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" disabled class="form-control" id="physician_name">
                                </div>

                                <div class="form-group">
                                    <label for="">Appointment Profile</label>
                                    <input type="text" disabled class="form-control" id="appointment_profile" name="appointment_profile">
                                </div>

                                <div class="form-group">
                                    <label for="">Reason for visit</label>
                                    <textarea rows="3" maxlength="250" disabled class="no-resize form-control" name="reason"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Schedule</label>
                                    <input type="datetime-local" class="form-control datepicker" name="scheduled_on">
                                </div>
                                <div class="form-group">
                                    <label for="">Duration</label>
                                    <select name="minutes" class="form-control">
                                      <option value="15">15 minutes</option>
                                      <option value="20">20 minutes</option>
                                      <option value="25">25 minutes</option>
                                      <option value="30">30 minutes</option>
                                      <option value="35">35 minutes</option>
                                      <option value="40">40 minutes</option>
                                      <option value="45">45 minutes</option>
                                      <option value="50">50 minutes</option>
                                      <option value="55">55 minutes</option>
                                      <option value="60">60 minutes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Exam Room</label>
                                    <select name="exam_room" class="form-control">
                                      <option value="Room 1">Room 1</option>
                                      <option value="Room 2">Room 2</option>
                                      <option value="Room 3">Room 3</option>
                                      <option value="Room 4">Room 4</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Doctor's Note</label>
                                    <textarea rows="3" maxlength="250" class="no-resize form-control" name="doctors_note"></textarea>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default">Cancel</button>
                    <button type="button" class="btn btn-primary btnDoneSetAppointment">Set Appointment</button>
                </div>
            </div>
        </div>
    </div>