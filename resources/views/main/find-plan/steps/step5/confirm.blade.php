<div class="col-md-12 step-parent">
	<div class="row">
		<div class="col-md-8 col-md-push-2 text-center">
			<h2 class="text-success">{!! trans('quote.step5.confirm.confirm_submit') !!}</h2>
			{{-- <p>Before submitting your application, please review and verify that you agree to the statements below.</p> --}}
			<div class="col-md-4">
				<strong>{!! trans('quote.step5.confirm.person') !!}</strong> <span class="fnt-raleway-m confirm-name"></span>
			</div>
			<div class="col-md-4">
				<strong>{!! trans('quote.step5.confirm.age') !!}</strong> <span class="fnt-raleway-m confirm-age"></span>
			</div>
			<div class="col-md-4">
				<strong>{!! trans('quote.step5.confirm.plan_chosen') !!}</strong> <span class="fnt-raleway-m confirm-plan-chosen"></span>
			</div>
			<div class="col-md-12 text-agreement">
				<div class="form-group">
					<div class="col-md-8">
						{!! trans('quote.step5.confirm.agreement1') !!}
					</div>
					<div class="col-md-4">
						<div class="form-group">
              <div class="btn-group btn-group-justified agreement1" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="agreement1" value="agree" checked autocomplete="off"> {!! trans('quote.step5.confirm.agree') !!}
                </label>
                <label class="btn">
                  <input type="radio" name="agreement1" value="disagree" autocomplete="off"> {!! trans('quote.step5.confirm.disagree') !!}
                </label>
              </div>
            </div>
          </div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						{!! trans('quote.step5.confirm.agreement2') !!}
					</div>
					<div class="col-md-4">
						<div class="form-group">
              <div class="btn-group btn-group-justified agreement2" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="agreement2" value="agree" checked autocomplete="off"> {!! trans('quote.step5.confirm.agree') !!}
                </label>
                <label class="btn">
                  <input type="radio" name="agreement2" value="disagree" autocomplete="off"> {!! trans('quote.step5.confirm.disagree') !!}
                </label>
              </div>
            </div>
          </div>
				</div>
				<div class="form-group">
					<div class="col-md-8">
						{!! trans('quote.step5.confirm.agreement3') !!}
					</div>
					<div class="col-md-4">
						<div class="form-group">
              <div class="btn-group btn-group-justified agreement3" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="agreement3" value="agree" checked autocomplete="off"> {!! trans('quote.step5.confirm.agree') !!}
                </label>
                <label class="btn">
                  <input type="radio" name="agreement3" value="disagree" autocomplete="off"> {!! trans('quote.step5.confirm.disagree') !!}
                </label>
              </div>
            </div>
          </div>
				</div>
			</div>
		
			<div class="col-md-12">
				<h4>{!! trans('quote.step5.confirm.type_name') !!}</h4>
				<div class="form-group">
					<div class="well well-sm">
						<strong id="verify-name" class="fnt-raleway-m" data-value=""></strong>
					</div>
				</div>
				<div class="form-group"  data-toggle="tooltip" data-placement="bottom" data-trigger="hover focus" data-title="Please type your name exactly as displayed above.">
					<input type="text" id="verify-input" class="fnt-raleway-m text-center form-control">
				</div>
			</div>
			<div class="col-md-12">
				<p class="text-center text-agree">
					{!! trans('quote.step5.confirm.click_parrot') !!}
				</p>
				<div class="confirm-wrapper">
					<img src="/assets/icons/parrot_mascot1-gray.png" alt="" class="img-responsive confirm-action">
				</div>
			</div>
		</div>
	</div>
	@include('main.find-plan.partials.templates.confirm-agreement-modal')
</div>
