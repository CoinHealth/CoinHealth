<template>
    <div class="modal fade modal-blue" id="modal-add-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Appointment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form action="">
                                <div class="form-group">
                                    <label for="">Doctor's name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Appointment Profile</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Reason for visit</label>
                                    <textarea rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Schedule</label>
                                </div>
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        mounted () {

        }
    }
</script>
