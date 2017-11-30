@extends('main.newprofile.base')

@section('styles')
	<link rel="stylesheet" href="/assets/css/sidebar.css">

<link rel="stylesheet" href="/assets/css/profile-event.css">
<link rel="stylesheet" href="/assets/css/profile-settings.css">
<link rel="stylesheet" href="/assets/css/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/vendor/select2/select2.min.css">

@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="profile-container">
		<div class="container">
			<div class="row out-2">

				<div class="col-md-12">

					<div class="pull-right">
						<div id="dl-menu" class="dl-menuwrapper">
							<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
							<ul class="dl-menu">
								<li>
									<a href="/profile/settings">{!! trans('profile.menu.menu1') !!}</a>
								</li>
								<li>
									<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
								</li>
								<li>
									<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
								</li>
							</ul>
						</div><!-- /dl-menuwrapper -->
					</div>
					<div class="pull-right mt-15">
							<a href="/profile" class="btn-back-profile">{!! trans('profile.menu.profile') !!}</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					@include('main.newprofile.partials.sidebar')
				</div>
				<div class="col-md-9">
					<div class="out">
						<div class="pull-left mt-15">
							<a href="/profile" class="btn-back-profile">{!! trans('profile.menu.profile') !!}</a>
						</div>
						<div class="pull-right">
							<div id="dl-menu" class="dl-menuwrapper">
								<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
								<ul class="dl-menu">
									<li>
										<a href="/profile/settings">{!! trans('profile.menu.menu1') !!}</a>
									</li>
									<li>
										<a href="/profile/life-changing-events">{!! trans('profile.menu.menu2') !!}</a>
									</li>
									<li>
										<a href="/auth/logout">{!! trans('profile.menu.menu3') !!}</a>
									</li>
								</ul>
							</div><!-- /dl-menuwrapper -->
						</div>
					</div>

					<div class="clear"></div>

					<div class="row row-settings">
						<div class="col-md-12">
							<div class="panel panel-default">
							  	<div class="panel-heading panel-yellow">
							  		{!! trans('profile.changing_events.title') !!}
							  	</div>

							  	<div class="panel-body">
							    	<div class="row">
							    		<div class="col-md-12">
												<div class='success-message alert alert-success'>
													<p>Life Changing Events has been sent to your agent!</p>
												</div>
							  				@if(isset($quote))
							    			<form autocomplete="off">

													<div class="col-md-12 icon-containers" align="center">

														<div class="icon-wrapper btn-event btn-income" data-toggle="income">
															<div class="inner" data-toggle="income">
																<img src="/assets/icons/quotes/change_in_income.png" alt="" class="img-responsive">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<p class="text-uppercase">{!! trans('profile.changing_events.income.title') !!}</p>
															</div>
														</div>

														<div class="icon-wrapper btn-event btn-marital" data-toggle="marital">
															<div class="inner" data-toggle="marital">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/marital_status_changed.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.marital.title') !!}</p>
															</div>
														</div>

														<div class="icon-wrapper btn-event btn-child" data-toggle="child">
															<div class="inner" data-toggle="child">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/had_a_child.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.child.title') !!}</p>
															</div>
														</div>
														<div class="icon-wrapper btn-event btn-circumstances" data-toggle="circumstances">
															<div class="inner" data-toggle="circumstances">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/extraordinary.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.circumstances.title') !!}</p>
															</div>
														</div>
														<div class="icon-wrapper btn-event btn-citizenship" data-toggle="citizenship">
															<div class="inner" data-toggle="citizenship">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/us_citizen.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.gained.title') !!}</p>
															</div>
														</div>
														<div class="icon-wrapper btn-event btn-location" data-toggle="location">
															<div class="inner" data-toggle="location">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/moved.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.location.title') !!}</p>
															</div>
														</div>
														<div class="icon-wrapper btn-event btn-incarceration" data-toggle="incarceration">
															<div class="inner" data-toggle="incarceration">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/recently_incarcerated.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.released.title') !!}</p>
															</div>
														</div>
													</div>

													<div class="col-md-12 form-containers" align="center">


														<div class="icon-wrapper btn-event btn-income income-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="income">
																<img src="/assets/icons/quotes/change_in_income.png" alt="" class="img-responsive">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<p class="text-uppercase">{!! trans('profile.changing_events.income.title') !!}</p>
															</div>
														</div>
								    				<div class="income-wrapper wrap col-md-8">
												      <div class="applicant-income-sources row-income" style="display:none;">
												      	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.income.applicant') !!} </label>
												              <select name="applicant_applicant[]" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.income.monthly') !!}</label>
												              <div class="input-group">
												                <span class="input-group-addon">$</span>
												                <input name="applicant_income_amount[]" type="text" class="monetary form-control applicant-monthly-amount" aria-label="Amount">
												              </div>
												            </div>
												          </div>
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.income.income') !!}</label>
												              <select name="applicant_income_type[]" id="" class="form-control select2 applicant_income_type"  multiple="multiple"> <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($income_types as $type)
												                  <option value="{{ $type->value }}">{{ $type->title }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												        </div>
												        <div class="row">
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.income.employer') !!}</label>
												              <input name="applicant_employer[]" type="text" class="form-control">
												            </div>
												          </div>
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.income.employer_phone') !!}</label>
												              <input name="applicant_employer_phone[]" type="text" class="form-control">
												            </div>
												          </div>
												        </div>
												      </div>
												      <div class="add-applicant">
																	<a class="btn btn-primary btn-add-applicant" data-toggle="income" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>

														<div class="icon-wrapper btn-event btn-marital marital-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="marital">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/marital_status_changed.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.marital.title') !!}</p>
															</div>
														</div>

														<div class="marital-wrapper wrap col-md-8">
												      <div class="applicant-marital row-marital" style="display:none;">
												       	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.marital.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												               @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
											           <div class="col-md-6">
												          <div class="form-group">
												            <label>{!! trans('profile.changing_events.marital.date') !!}</label>
												            <input name="applicant_marriage_date[]" type="text">
												          </div>
												        </div>
												         <div class="col-md-6">
										              <div class="form-group">
										                <label for="applicant_tax_status">{!! trans('profile.changing_events.marital.tax') !!}</label>
										                <select name="applicant_tax_status[]"  class=" form-control select2" id="applicant_tax_status">
										                  <option value=""></option>
										                  @foreach($tax_status as $status)
										                    <option value="{{ $status->value }}">{{ $status->title }}</option>
										                  @endforeach
										                </select>
										              </div>
										            </div>
												        </div>
												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="marital" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>

													 	<div class="icon-wrapper btn-event btn-child child-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="child">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/had_a_child.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.child.title') !!}</p>
															</div>
														</div>
														<div class="child-wrapper wrap col-md-8">
												      <div class="applicant-child row-child" style="display:none;">
												       	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.child.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
												          <div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.child.birth') !!}</label>
												              <input name="applicant_child_birth[]" type="text" class="form-control">
												            </div>
												          </div>
												        </div>
												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="child" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>

														<div class="icon-wrapper btn-event btn-circumstances circumstances-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="circumstances">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/extraordinary.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.circumstances.title') !!}</p>
															</div>
														</div>

														<div class="circumstances-wrapper wrap col-md-8">
												      <div class="applicant-circumstances-sources row-circumstances" style="display:none;">
												       	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.circumstances.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												               @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
												          <div class="col-md-10 col-md-offset-1" >
												            <div class="form-group">
												              <label for="" class="text-uppercase">{!! trans('profile.changing_events.circumstances.complicated_cases') !!}</label>
												              <select name="applicant_exceptional_circumstances[]" id="" class="form-control select2 applicant_exceptional_circumstances" multiple="multiple">
												                <option value=""></option>
												                @foreach($circumstances as $circumstance)
												                  <option value="{{ $circumstance->value }}">{{ $circumstance->title }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												        </div>
												        <label class="applicant-circumstances">{!! trans('profile.changing_events.circumstances.qualify') !!}</label>
												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="circumstances" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>

														<div class="icon-wrapper btn-event btn-citizenship citizenship-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="citizenship">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/us_citizen.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.gained.title') !!}</p>
															</div>
														</div>

														<div class="citizenship-wrapper wrap col-md-8">
												      <div class="applicant-citizenship-sources row-citizenship" style="display:none;">
												      	 <div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.gained.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												      	<div class="row">
											            <div class="col-md-10 col-md-offset-1">
											              <div class="form-group">
											                <label for="">{!! trans('profile.changing_events.gained.applicant_documents') !!}</label>
											                <select name="applicant_naturalization_documents[]" id="" class="form-control">
											                  <option selected disabled>{!! trans('profile.changing_events.gained.select') !!}</option>
											                  <option value="1">{!! trans('profile.changing_events.gained.cert_naturalization') !!}</option>
											                  <option value="2">{!! trans('profile.changing_events.gained.cert_citizenship') !!}</option>
											                </select>
											              </div>
											            </div>
										            </div>
											          <div style="display:none;" class="row naturalized-conditions" id="naturalized-con1">
											            <div class="col-md-6">
											              <div class="form-group">
											                <label for="" class="citizen-title">{!! trans('profile.changing_events.gained.alien_number') !!}</label>
											                <input type="text" class="form-control" name="alien_number">
											              </div>
											            </div>
											            <div class="col-md-6">
											              <div class="form-group">
											                <label for="" class="citizen-title">{!! trans('profile.changing_events.gained.naturalization_cert_number') !!}</label>
											                <input type="text" class="form-control" name="naturalization_certificate_number" id="naturalization_certificate_number">
											              </div>
											            </div>
											          </div>
											          <div style="display:none;" class="row naturalized-conditions" id="naturalized-con2">
											            <div class="col-md-6">
											              <div class="form-group">
											                <label for="" class="citizen-title">{!! trans('profile.changing_events.gained.alien_number') !!}</label>
											                <input type="text" class="form-control" name="alien_number">
											              </div>
											            </div>
											            <div class="col-md-6" >
											              <div class="form-group">
											                <label for="" class="citizen-title">{!! trans('profile.changing_events.gained.citizenship_cert_number') !!}</label>
											                <input type="text" class="form-control" name="citizenship_certificate_number">
											              </div>
											            </div>
											          </div>

												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="citizenship" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>

														<div class="icon-wrapper btn-event btn-location location-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="location">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/moved.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.location.title') !!}</p>
															</div>
														</div>

														<div class="location-wrapper wrap col-md-8">
												      <div class="applicant-location-sources row-location" style="display:none;">
												       	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.location.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
												         <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.location.residential') !!}</label>
												              <input name="applicant_residential_address[]" type="text" class="form-control">
												            </div>
												          </div>
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.location.apt_unit_no') !!}</label>
												              <input name="applicant_apt_unit_no[]" type="text" class="form-control">
												            </div>
												          </div>
												        </div>
												        <div class="row">
												          <div class="col-md-6">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.location.city') !!}</label>
												              <input name="applicant_city[]" type="text" class="form-control">
												            </div>
												          </div>
									                <div class="col-md-6">
											              <div class="row">
											                <div class="col-md-6">
											                  <div class="form-group">
											                    <label for="">{!! trans('profile.changing_events.location.state') !!}</label>
											                    <select name="applicant_state[]" id="" class="adress-input select2">
											                      <option></option>
											                      @foreach($locations as $location)
											                      <option value="{{ $location->state_abbr }}">{{ $location->state_abbr }}</option>
											                      @endforeach
											                    </select>
											                    <input type="hidden" id="applicant_state_abbr">
											                  </div>
											                </div>
											                <div class="col-md-6">
											                  <div class="form-group">
											                    <label for="">{!! trans('profile.changing_events.location.zip_code') !!}</label>
											                    <input name="applicant_zipcode[]" id="" type="text" class="adress-input form-control" placeholder="Zip Code">
											                  </div>
											                </div>
											              </div>
											            </div>

												        </div>
												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="location" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>
														<div class="icon-wrapper btn-event btn-incarceration incarceration-wrapper col-md-4 wrapper">
															<div class="inner" data-toggle="incarceration">
																<input type="checkbox" name="qualifying_events" class="qualifying-events hidden">
																<img src="/assets/icons/quotes/recently_incarcerated.png" alt="" class="img-responsive">
																<p class="text-uppercase">{!! trans('profile.changing_events.released.title') !!}</p>
															</div>
														</div>
														<div class="incarceration-wrapper wrap col-md-8">
												      <div class="applicant-incarceration row-incarceration" style="display:none;">
												       	<div class="row">
												      		<div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.released.applicant') !!} </label>
												              <select name="applicant_applicant[]" id="" class="form-control select2 applicant_applicant" > <!-- multiple="multiple" -->
												                <option value=""></option>
												                @foreach($quote->decoded_applicants as $applicant)
												                  <option value="{{ $applicant->fullname }}">{{ $applicant->fullname }}</option>
												                @endforeach
												              </select>
												            </div>
												          </div>
												      	</div>
												        <div class="row">
												          <div class="col-md-10 col-md-offset-1">
												            <div class="form-group">
												              <label for="">{!! trans('profile.changing_events.released.date') !!}</label>
												              <input name="applicant_incarceration[]" type="text" class="form-control">
												            </div>
												          </div>
												        </div>
												      </div>
												      <div class="add-applicant">
																<a class="btn btn-primary btn-add-applicant" data-toggle="incarceration" role="button"><i class="fa fa-fw fa-plus" aria-hidden="true"></i> {!! trans('profile.changing_events.add') !!}</a>
												      </div>
														</div>
													</div>



													<div class="event-button">
														<a href="#upload-attachments" data-toggle="modal" class="btn btn-primary">
															{!! trans('profile.changing_events.upload') !!} <i class="fa fa-upload" style="margin-left:5px;"></i>
														</a>
														<a class="btn btn-success btn-submit" role="button">{!! trans('profile.changing_events.submit') !!}</a>
														<button type="button" class="btn btn-default" id="btnCancel">{!! trans('profile.changing_events.cancel') !!}</button>
													</div>
												</form>
												@else
												<label>{!! trans('profile.changing_events.nothing') !!}</label>
							  				@endif
							    		</div>
							    	</div>
							  	</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
  @include('main.newprofile.partials.profile-modal')
  @include('main.newprofile.partials.upload-attachment')
@endsection

@section('scripts')
	<script src="/assets/js/sidebar.js"></script>
	<script type="text/javascript">
		sidebar.init();
	</script>
	<script type="text/javascript" src="/assets/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="/assets/js/jquery.dlmenu.js"></script>
	<script type="text/javascript" src="/assets/js/profile-events.js"></script>
	<script src="/assets/js/vendor/jquery.date-dropdowns.min.js"></script>
	<script type="text/javascript" src="/assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/assets/js/vendor/select2/select2.js"></script>
	<script type="text/javascript" src="/assets/js/dropzone.min.js"></script>
	<script type="text/javascript">
	$(function() {
		Dropzone.autoDiscover = false;
		events.init();
		events.initAttachments();
	});
	</script>

	<script type="text/javascript">
		$(".btn-view").click(function () {
			$(".view-doc-row").fadeIn();
			$(".upload-doc-row").fadeOut();
		});

		$(".btn-upload").click(function () {
			$(".upload-doc-row").fadeIn();
			$(".view-doc-row").fadeOut();
		});
	</script>
@endsection
