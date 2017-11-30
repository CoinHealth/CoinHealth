<div class="modal fade modal-blue" id="add-staff" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        Add Staff
                    </h4>
                </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-setting" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <label class="alert-label"></label>
                                    </div>
                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                    <div class="form-group">
                                        <label for="">Please enter your staff email address:</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary btnSubmit">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>