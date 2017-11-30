<div class="modal fade modal-blue" id="add-payment" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Payment</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control">
                                    <option value="">General Check-Up</option>
                                    <option value="">Consultation</option>
                                    <option value="">Follow up</option>
                                    <option value="">Urgent Care</option>
                                    <option value="">Emergency</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                        </form>

                        <div class="clear mt-30"></div>
                        <div class="pull-right float-responsive">
                            <a @click.prevent="add" class="btn-blue">Confirm</a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
