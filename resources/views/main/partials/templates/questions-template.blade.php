<div class="modal fade" id="questionsModal" tabindex="-1" role="dialog">
  <div class="health-modal-dialog modal-dialog">
    <form action="/profile/healthquestions" method="post" id="healthForm">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-content">
        <div class="health-modal-header modal-header">
          <img src="/assets/icons/logo.png" alt="">
        </div>
        <div class="health-modal-body modal-body">
          <div class="row">
            @if($questions)
            @foreach($questions as $question)
            <div class="col-md-12 health-questions-wrapper">
              <div class="col-sm-5">
  							<div class="btn-group health-btn-question" name="answer" data-toggle="buttons">
  			          <label class="btn">
  			            <input type="radio" name="answer[{{ $question->id }}]" value="1" checked autocomplete="off"> Yes
  			          </label>
  			          <label class="btn">
  			            <input type="radio" name="answer[{{ $question->id }}]" value="0" autocomplete="off"> No
  			          </label>
  			        </div>
  						</div>
              <div class="col-sm-7">
              <label>{{ $question->activity_question }}</label>
              </div>
            </div>
            @endforeach
            @endif
          </div>
        </div>
        <div class="health-modal-footer modal-footer">
          <button type="submit" class="btn btn-primary" id="btnOk">Ok</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
