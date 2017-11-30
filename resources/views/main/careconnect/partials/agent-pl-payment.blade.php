<div class="modal fade" id="agentPaymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-pl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 nopadding">
            <div class="as-1">
              <div class="row">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="full_name">
                </div>
                <div class="form-group">
                  <label>Credit Card Number</label>
                  <input type="text" class="form-control" name="credit_card_number">
                </div>
                <div class="form-group">
                  <label>Credit Card Type</label>
                  <select class="form-control" name="credit_card_type">
                    <option></option>
                    <option></option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Website</label>
                  <input type="text" class="form-control" name="website">
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6 nopadding">
            <div class="as-2">
              <p><i class="fa fa-lock"></i> Secure Transaction</p>
              <p>Bank fees and applicable taxes may change your final amount</p>
              <div class="form-group">
                  <label>Expiration Date</label>
                  <div>
                    <select class="form-control" style="width:49%;display:inline-block;">
                      <option value="01">Jan</option>
                      <option value="02">Feb</option>
                      <option value="03">Mar</option>
                      <option value="04">Apr</option>
                      <option value="05">May</option>
                      <option value="06">Jun</option>
                      <option value="07">Jul</option>
                      <option value="08">Aug</option>
                      <option value="09">Sept</option>
                      <option value="10">Oct</option>
                      <option value="11">Nov</option>
                      <option value="12">Dec</option>
                    </select>
                    <select class="form-control" style="width:45%;display:inline-block;">
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label>CVV / CID <span class="lblsec"> (Security Code) </span></label>
                <input type="text" class="form-control" name="cvv_cid">
              </div>
              <div class="form-group">
                <label>Subscription</label>
                <select name="subscription" id="subscription" class="form-control select2 premium">
                   <option></option>
                   <option value="monthly">Monthly ($0.99)</option>
                   <option value="annual">Annual ($9.99)</option>
                 </select>
              </div>
              
            </div>
          </div>
          <div class="text-center authorize">
                <input type="checkbox" name=""> I hereby authorize Careparrot and Affiliates to charge my credit card for this transaction.
          </div>
          <div class="center sub">
            <a href="#" class="btn btn-primary btn-blue">Submit</a><br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
