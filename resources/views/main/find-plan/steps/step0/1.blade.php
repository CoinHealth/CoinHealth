<div class="col-md-12 text-center step-parent special-enrollment">
	<div class="row">

		<div class="col-md-8 col-md-push-2 enroll-container">
			<h2>{!! trans('quote.step0.1.special') !!}</h2>
			<div dir="{{ session('locale') === 'ar' ? 'rtl' : 'ltr' }}">
				<p>{!! trans('quote.step0.1.enrollment_period1') !!} {{ $open_enrollment_period->to->format('F d, Y') }} {!! trans('quote.step0.1.enrollment_period2') !!}</p>
				<p>{!! trans('quote.step0.1.applying_lost_desc1') !!}
					<span class="text-cyan">{!! trans('quote.step0.1.since') !!} {{ $lose_or_losing_coverage['from']->format('F d, Y') }}</span>
					{!! trans('quote.step0.1.applying_lost_desc2') !!}
					<span>{!! trans('quote.step0.1.by') !!} {{ $lose_or_losing_coverage['to']->format('F d, Y') }}</span> {!! trans('quote.step0.1.applying_lost_desc3') !!}
				</p>
			</div>
			<!-- <button type="button" class=" btn btn-default btn-lg">LOSE OR LOSING COVERAGE</button> -->
			<div class="btn-group mg-top-20 mg-bottom-20 btn-income-past btn-main" role="group" data-toggle="buttons">
				<label class="btn btn-default">
					<input type="checkbox" value="yes" name="qualifying_events[]" class="qualifying-events" autocomplete="off"> {!! trans('quote.step0.1.lost_coverage') !!}
				</label>
			</div>
			<p>{!! trans('quote.step0.1.change_events_desc1') !!} <span class="text-cyan">{{ $now->subDays(60)->format('F d, Y') }}</span>{!! trans('quote.step0.1.change_events_desc2') !!}</p>
		</div>
		<div class="col-md-12 icon-containers">
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<img src="/assets/icons/quotes/change_in_income.png" alt="" class="img-responsive">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<p class="text-uppercase">{!! trans('quote.step0.1.change_in_income') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/marital_status_changed.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.marital_status') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/had_a_child.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.had_a_child') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/extraordinary.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.exceptional_circumstances') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/us_citizen.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.gained_citizenship') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/moved.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.moved_location') !!}</p>
				</div>
			</div>
			<div class="icon-wrapper btn-event">
				<div class="inner">
					<input type="checkbox" name="qualifying_events[]" class="qualifying-events hidden">
					<img src="/assets/icons/quotes/recently_incarcerated.png" alt="" class="img-responsive">
					<p class="text-uppercase">{!! trans('quote.step0.1.released_incarceration') !!}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="mg-top-20">
		<button type="button" class="nextBtn btn btn-success" onclick="plan.scrollTop()">{!! trans('quote.continue') !!}</button>
	</div>
</div>
