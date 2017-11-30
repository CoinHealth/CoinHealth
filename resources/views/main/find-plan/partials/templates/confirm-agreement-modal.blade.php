<div class="modal fade" id="agreementModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3>Privacy Act Statement</h3>
        </div>
        <div class="modal-body" align="justify">
          <div class="row">
            <div class="col-md-12 wrapper">
              <h4>{!! trans('privacy-terms.permission') !!}</h4>
      				<p>{!! trans('privacy-terms.permission-desc1') !!}</p>
      				<h4>{!! trans('privacy-terms.privacy-act') !!}</h4>
      				<p>{!! trans('privacy-terms.privacy-act-desc1') !!}</p>
      				<p>{!! trans('privacy-terms.privacy-act-desc2') !!}</p>
      				<p>{!! trans('privacy-terms.privacy-act-desc3') !!}</p>
      				<p>{!! trans('privacy-terms.privacy-act-desc4') !!}</p>
      				<ol>
      					<li>{!! trans('privacy-terms.privacy-act-li1') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li2') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li3') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li4') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li5') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li6') !!}</li>
      					<li>{!! trans('privacy-terms.privacy-act-li7') !!}</li>
      				</ol>
      				<h4>{!! trans('privacy-terms.identity') !!}</h4>
      				<p>{!! trans('privacy-terms.identity-desc1') !!}</p>
              <ul>
      					<li>{!! trans('privacy-terms.identity-li1') !!}</li>
      					<li>{!! trans('privacy-terms.identity-li2') !!}</li>
      					<li>{!! trans('privacy-terms.identity-li3') !!}</li>
              </ul>
              <p>{!! trans('privacy-terms.identity-desc1') !!} <a href='https://www.healthcare.gov/how-we-use-your-data' target="_blank">'https://www.healthcare.gov/how-we-use-your-data</a>.</p>
            </div>
          </div>
        </div>
         <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
          <input type="hidden" id="agreement" value="0">
          <button type="button" data-dismiss="modal" name="cmdAgree" class="btn btn-success">Yes, I agree</button>
          <button type="button" data-dismiss="modal" name="cmdDisagree" class="btn btn-danger">No, I do not agree</button>

        </div>
      </div>
    </form>
  </div>
</div>
