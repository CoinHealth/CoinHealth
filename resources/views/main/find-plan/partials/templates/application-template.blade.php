<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="id-of-heading">
    <a class="panel-title text-cyan applicant-type" role="button" data-toggle="collapse" data-parent="#applicants-panel" href="#" aria-expanded="false" aria-controls="id-of-collapse"></a>
    <button type="button" class="close applicant-remove" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>
  <input type="hidden" id="applicationNumber" value="0">
  <div id="id-of-collapse" class="panel-collapse collapse" role="tabpanel" aria-labelledby="id-of-heading">
    <div class="panel-body">
      <h4 class="applicant-text-header">{!! trans('quote.step5.1.basic_info') !!}</h4>
      <div class="row">
      <!-- row PREFERRED LANGUAGE -->
        <div class="row-preffered-language">
          <div class="col-md-6">
            <div class="form-group pull-left preffered-language">
              <label>{!! trans('quote.step5.1.preffered_language') !!}</label>
              {{--
              <div class="btn-group btn-group-justified applicant_language" data-toggle="buttons">
                <label class="btn active">
                  <input type="radio" name="applicant_language" value="ENG" autocomplete="off"> ENGLISH
                </label>
                <label class="btn">
                  <input type="radio" name="applicant_language" value="SPN" autocomplete="off"> SPANISH
                </label>
              </div> --}}
              <select name="preffered_language" id="preffered_language" class="form-control applicant_language">
                <option value="en">English</option>
                <option value="es">Español</option>
                <option value="fr">French</option>
                <option value="ar">Arabic</option>
                <option value="zh">Mandarin (Simplified)</option>
              </select>
            </div>
          </div>
        </div>
        <!-- row HEALTH COVERAGE -->
        <div class="row-health-coverage">
          <div class="col-md-6">
            <div class="form-group pull-right">
              <label>{!! trans('quote.step5.1.apply_hc') !!}</label>
              <div class="btn-group btn-group-justified applicant_health_coverage" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="applicant_health_coverage[]" value="YES" autocomplete="off"> {!! trans('quote.step5.1.yes') !!}
                </label>
                <label class="btn">
                  <input type="radio" name="applicant_health_coverage[]" value="NO" autocomplete="off"> {!! trans('quote.step5.1.no') !!}
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-fullname">
        <div class="col-md-12">
          <div class="form-group">
            <label for="">{!! trans('quote.step5.1.full_name') !!}</label>
            <input type="text" id="" name="applicant_fullname[]" class="form-control" placeholder="Full name">
          </div>
        </div>
      </div>
      {{-- row fullname  --}}
      <div class="mailing-address-container">
        <div class="mailing-address-row">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!! trans('quote.step5.1.residential_address') !!}</label>
                <input id="" type="text" name="applicant_address[]" class="adress-input form-control address-placeholder" placeholder="Residential Address" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!! trans('quote.step5.1.apt_unit_no') !!}</label>
                <input id="" name="applicant_apt[]" type="text" class="adress-input form-control" placeholder="APT / Unit No." value="">
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!! trans('quote.step5.1.city') !!}</label>
                <input id="" name="applicant_city[]" type="text" class="adress-input form-control" placeholder="City" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">{!! trans('quote.step5.1.state') !!}</label>
                    {{-- <input name="applicant_state[]" id="" type="text" class="form-control" placeholder="State" value=""> --}}
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
                    <label for="">{!! trans('quote.step5.1.zip_code') !!}</label>
                    <input name="applicant_zipcode[]" id="" type="text" class="adress-input form-control" placeholder="Zip Code">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- row address --}}
      <div class="row row-applicant-address-checks">
        <div class="col-md-6">
          <div class="form-group">
            <input type="checkbox" id="separate" class="chk-separate">
            <label for="separate">{!! trans('quote.step5.1.separate_address') !!}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="checkbox" id="same_address" class="same-address">
            <label for="same_address">{!! trans('quote.step5.1.same_address') !!}</label>
          </div>
        </div>
      </div>
      {{-- row applicant address --}}
      <div class="row row-social-security">
        <div class="col-md-6">
          <div class="form-group">
            <label for="applicant_sss">{!! trans('quote.step5.1.ssn') !!}</label>
            <input name="applicant_sss[]" type="text" maxlength="11" class="input-sss form-control" id="applicant_sss" PLACEHOLDER="XXX-XX-XXXX">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="btn-main btn-sss" data-toggle="buttons">
              <label title="{!! trans('quote.step5.1.dont_have_ssn') !!}" for="" class="btn-dont-have-sss btn btn-default btn-block cp-btn-checkbox">
                <input class="chk-dont-have-sss" type="checkbox" autocomplete="off"> {!! trans('quote.step5.1.dont_have_ssn') !!}
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-social-security">
        <div class="col-md-6">
          <div class="form-group">
            <div class="btn-main btn-name-sss" data-toggle="buttons">
              <label title="{!! trans('quote.step5.1.diff_name_ssn') !!}" for="" class="btn-different-name-sss btn btn-default btn-block cp-btn-checkbox">
                <input class="chk-different-name-sss" type="checkbox" autocomplete="off"> {!! trans('quote.step5.1.diff_name_ssn') !!}
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input name="applicant_name_sss[]" type="text" maxlength="30" class="input-name-sss form-control" id="applicant_name_sss" PLACEHOLDER="Name">
          </div>
        </div>
      </div>
      {{-- row social-security --}}
      <div class="row row-gender-dob">
        <div class="col-md-6">
          <div class="form-group">
            <label>{!! trans('quote.step5.1.gender') !!}</label>
            <div class="btn-group btn-group-justified applicant_gender" data-toggle="buttons">
              <label class="btn">
                <input type="radio" name="applicant_gender[]" value="M" autocomplete="off"> {!! trans('quote.step5.1.male') !!}
              </label>
              <label class="btn">
                <input type="radio" name="applicant_gender[]" value="F" autocomplete="off"> {!! trans('quote.step5.1.female') !!}
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>{!! trans('quote.step5.1.dob') !!}</label>
            <input name="applicant_dob[]" type="text">
          </div>
        </div>
      </div>
      <!-- row dependents relationship -->
      <div class="row row-relationship">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="applicant_relationship">{!! trans('quote.step5.1.relationship-uc') !!}</label>
                <select name="applicant_relationship[]"  class=" form-control select" class="applicant_relationship">
                  <option value="" selected disabled>{!! trans('quote.step5.1.relationship') !!}</option>
                  <option value="0">{!! trans('quote.step5.1.spouse') !!}</option>
                  <option value="1">{!! trans('quote.step5.1.son_daughter') !!}</option>
                  <option value="2">{!! trans('quote.step5.1.father_mother') !!}</option>
                  <option value="3">{!! trans('quote.step5.1.brother_sister') !!}</option>
                  <option value="4">{!! trans('quote.step5.1.grandparents') !!}</option>
                  <option value="5">{!! trans('quote.step5.1.relative') !!}</option>
                  <option value="6">{!! trans('quote.step5.1.uncle_aunt') !!}</option>
                  <option value="7">{!! trans('quote.step5.1.nephew_niece') !!}</option>
                  <option value="8">{!! trans('quote.step5.1.grandchild') !!}</option>
                  <option value="9">{!! trans('quote.step5.1.adopted') !!}</option>
                  <option value="10">{!! trans('quote.step5.1.foster_child') !!}</option>
                  <option value="11">{!! trans('quote.step5.1.guardian') !!}</option>
                  <option value="12">{!! trans('quote.step5.1.collateral_dependent') !!}</option>
                  <option value="13">{!! trans('quote.step5.1.sponsored_dependent') !!}</option>
                  <option value="14">{!! trans('quote.step5.1.minor_dependent') !!}</option>
                  <option value="15">{!! trans('quote.step5.1.other') !!}</option>
                  <!-- <option value=""></option> -->
                </select>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      {{-- row gender dob --}}
      <div class="row row-taxes">
        <div class="col-md-12">
          <h5>{!! trans('quote.step5.1.all_apply') !!}</h5>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="applicant_tax_status">{!! trans('quote.step5.1.tax_status') !!}</label>
                <select name="applicant_tax[]"  class=" form-control select2" id="applicant_tax_status">
                  <option value=""></option>
                  @foreach($tax_status as $status)
                    <option value="{{ $status->value }}">{{ $status->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      {{-- row taxes --}}
      <h4 class="applicant-text-header">{!! trans('quote.step5.1.income') !!}</h4>
      <div class="applicant-income-sources row-income">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">{!! trans('quote.step5.1.monthly_amount') !!}</label>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input name="applicant_income_amount[]" type="text" class="monetary form-control applicant-monthly-amount" aria-label="Amount">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">{!! trans('quote.step5.1.income_type') !!}</label>
              <select name="applicant_income_type[]" id="" class="form-control select2 applicant_income_type" multiple="multiple">
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
              <label for="">{!! trans('quote.step5.1.employer') !!}</label>
              <input name="applicant_employer[]" type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">{!! trans('quote.step5.1.employer_phone') !!}</label>
              <input name="applicant_employer_phone[]" type="text" class="form-control">
            </div>
          </div>
        </div>
        <p class="applicant-income-approx fnt-raleway-m">{!! trans('quote.step5.1.income_aprox1') !!} $<span class="applicant-annual-income">0</span> in {{ date('Y') }}. {!! trans('quote.step5.1.income_aprox2') !!}</p>
        <div class="col-md-12 text-center">
          <div class="btn-group btn-income-approx" data-toggle="buttons">
            <label class="btn active">
              <input type="radio" value="yes" checked autocomplete="off"> {!! trans('quote.step5.1.yes') !!}
            </label>
            <label class="btn">
              <input type="radio" value="no" autocomplete="off"> {!! trans('quote.step5.1.no') !!}
            </label>
          </div>
        </div>
      </div>
      <!-- ROW OTHER DETAILS -->
      <div class="row row-other-details">
        <div class="col-md-12">
          <div class="form-group form-select" style="display: block">
            <h4 class="applicant-text-header">{!! trans('quote.step5.1.other_details') !!}</h4>
            <div class="btn-group btn-block" data-toggle="buttons">
              <label class="app-btn-orange btn btn-block" id="applicant_tobacco">
                <input type="checkbox" data-applicant-name="tobacco" class="applicant-tobacco" autocomplete="off"> {!! trans('quote.step5.1.tobacco_user') !!} <span class="pull-right icon-checked"></span>
              </label>
              <label class="app-btn-orange btn btn-block" id="applicant_parent">
                <input type="checkbox" data-applicant-name="parent" class="applicant-parent" autocomplete="off"> {!! trans('quote.step5.1.parent_caretaker') !!} <span class="pull-right icon-checked"></span>
              </label>
              <label class="app-btn-orange btn btn-block" id="applicant_job">
                <input type="checkbox" data-applicant-name="job" class="applicant-job" autocomplete="off"> {!! trans('quote.step5.1.job_offers') !!} <span class="pull-right icon-checked"></span>
              </label>
              <label class="app-btn-orange btn btn-block" id="applicant_pregnant">
                <input type="checkbox" data-applicant-name="pregnant" class="applicant-pregnant" autocomplete="off"> {!! trans('quote.step5.1.pregnant') !!} <span class="pull-right icon-checked"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
      {{-- applicant income source --}}
      <h4 class="applicant-text-header">{!! trans('quote.step5.1.citizenship_immigration') !!}</h4>
      <div class="citizenship-container">
        <div class="row row-citizenship">
          <div class="col-md-6">
            <div class="form-group">
              <p><label>{!! trans('quote.step5.1.us_citizen') !!}</label></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="btn-group btn-group-justified us-citizen" data-toggle="buttons">
                <label class="btn active">
                  <input type="radio" name="us_citizen[]" value="yes" checked autocomplete="off"> {!! trans('quote.step5.1.yes') !!}
                </label>
                <label class="btn">
                  <input type="radio" name="us_citizen[]" value="no" autocomplete="off"> {!! trans('quote.step5.1.no') !!}
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-indian-alaskan-citizenship">
          <div class="col-md-6">
            <div class="form-group">
              <p><label>{!! trans('quote.step5.1.indian_alaskan_citizen') !!}</label></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="btn-group btn-group-justified indian-alaskan-citizen" data-toggle="buttons">
                <label class="btn">
                  <input type="radio" name="indian_alaskan_citizen[]" value="yes" autocomplete="off"> {!! trans('quote.step5.1.yes') !!}
                </label>
                <label class="btn active">
                  <input type="radio" name="indian_alaskan_citizen[]" value="no" checked autocomplete="off"> {!! trans('quote.step5.1.no') !!}
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row row-naturalized-citizenship">
          <div class="col-md-6">
            <div class="form-group">
              <p><label>{!! trans('quote.step5.1.naturalized_citizen') !!}</label></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="btn-group btn-group-justified naturalized-citizen" data-toggle="buttons">
                <label class="btn btn-yes">
                  <input type="radio" name="naturalized_citizen[]" value="yes" autocomplete="off"> {!! trans('quote.step5.1.yes') !!}
                </label>
                <label class="btn btn-no active">
                  <input type="radio" name="naturalized_citizen[]" value="no" checked autocomplete="off"> {!! trans('quote.step5.1.no') !!}
                </label>
              </div>
            </div>
          </div>
        </div>
        <!-- naturalized citizen condition -->
        <div class="naturalized-citizen-condition-container" style="display:none;">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!!trans('quote.step5.1.naturalization_documents.applicant_documents') !!}</label>
                <select name="applicant_naturalization_documents[]" id="" class="form-control  select">
                  <option selected disabled>{!!trans('quote.step5.1.naturalization_documents.select') !!}</option>
                  <option value="1">{!!trans('quote.step5.1.naturalization_documents.cert_naturalization') !!}</option>
                  <option value="2">{!!trans('quote.step5.1.naturalization_documents.cert_citizenship') !!}</option>
                </select>
              </div>
            </div>
          </div>
          <div style="display:none;" class="row naturalized-conditions" id="naturalized-con1">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!!trans('quote.step5.1.naturalization_documents.alien_number') !!}</label>
                <input type="text" class="form-control" name="alien_number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!!trans('quote.step5.1.naturalization_documents.naturalization_cert_number') !!}</label>
                <input type="text" class="form-control" name="naturalization_certificate_number">
              </div>
            </div>
          </div>
          <div style="display:none;" class="row naturalized-conditions" id="naturalized-con2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!!trans('quote.step5.1.naturalization_documents.alien_number') !!}</label>
                <input type="text" class="form-control" name="alien_number">
              </div>
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label for="">{!!trans('quote.step5.1.naturalization_documents.citizenship_cert_number') !!}</label>
                <input type="text" class="form-control" name="citizenship_certificate_number">
              </div>
            </div>
          </div>
        </div>
        <div class="citizenship-condition-container" style="display:none;">
          <div class="row row-documents">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">{!! trans('quote.step5.1.immigration_documents.applicant_documents') !!}</label>
                <select name="applicant_immigration_documents[]" id="" class="form-control  select2">
                  <option></option>
                  @foreach($immigration_documents as $doc)
                    <option value="{{ $doc->value }}">{{ $doc->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con1">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con1_alien_number">{!! trans('quote.step5.1.immigration_documents.alien_number') !!}</label>
                <input type="text" class="form-control" id="con1_alien_number" placeholder="Alien Number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="i551_green_card_number">{!! trans('quote.step5.1.immigration_documents.green_card_number') !!}</label>
                <input type="text" id="i551_green_card_number" placeholder="Green Card Number" class="form-control">
              </div>
            </div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con2">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con2_alien_number">{!! trans('quote.step5.1.immigration_documents.alien_number') !!}</label>
                <input type="text" id="con2_alien_number" class="form-control" placeholder="Alien Number">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con3">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con3_passport_number">{!! trans('quote.step5.1.immigration_documents.passport_number') !!}</label>
                <input type="text" class="form-control" id="con3_passport_number" placeholder="Passport Number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con3_passport_country">{!! trans('quote.step5.1.immigration_documents.passport_country') !!}</label>
                <input type="text" class="form-control" id="con3_passport_country" placeholder="Passport Country">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con3_passport_expiration">{!! trans('quote.step5.1.immigration_documents.passport_expiration') !!}</label>
                <input type="text" id="con3_passport_expiration" class="form-control" placeholder="Passport Expiration">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con3_alien_number">{!! trans('quote.step5.1.immigration_documents.alien_number') !!}</label>
                <input type="text" class="form-control" placeholder="Alien Number" id="con3_alien_number">
              </div>
            </div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con4_ead_number">{!! trans('quote.step5.1.immigration_documents.ead_number') !!}</label>
                <input type="text" placeholder="EAD Number" id="con4_ead_number" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con4_ead_expiration">{!! trans('quote.step5.1.immigration_documents.ead_expiration') !!}</label>
                <input type="text" id="con4_ead_expiration" placeholder="EAD Expiration" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con4_ead_category">{!! trans('quote.step5.1.immigration_documents.ead_category_code') !!}</label>
                <input type="text" id="con4_ead_category" placeholder="EAD Category" class="form-control">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con5">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con5_i94_number">{!! trans('quote.step5.1.immigration_documents.i_94_number') !!}</label>
                <input type="text" id="con5_i94_number" class="form-control" placeholder="I-94 Number">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con6">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con6_passport_number">{!! trans('quote.step5.1.immigration_documents.passport_number') !!}</label>
                <input type="text" class="form-control" id="con6_passport_number" placeholder="Passport Number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con6_passport_country">{!! trans('quote.step5.1.immigration_documents.passport_country') !!}</label>
                <input type="text" class="form-control" id="con6_passport_country" placeholder="Passport Country">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con6_passport_expiration">{!! trans('quote.step5.1.immigration_documents.passport_expiration') !!}</label>
                <input type="text" id="con6_passport_expiration" class="form-control" placeholder="Passport Expiration">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con6_i94_number">{!! trans('quote.step5.1.immigration_documents.i_94_number') !!}</label>
                <input type="text" class="form-control" id="con6_i94_number">
              </div>
            </div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con7">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con7_passport_number">{!! trans('quote.step5.1.immigration_documents.passport_number') !!}</label>
                <input type="text" class="form-control" id="con7_passport_number" placeholder="Passport Number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con7_passport_country">{!! trans('quote.step5.1.immigration_documents.passport_country') !!}</label>
                <input type="text" class="form-control" id="con7_passport_country" placeholder="Passport Country">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="con7_passport_expiration">{!! trans('quote.step5.1.immigration_documents.passport_expiration') !!}</label>
                <input type="text" id="con7_passport_expiration" class="form-control" placeholder="Passport Expiration">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con8">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con8_alien_number">{!! trans('quote.step5.1.immigration_documents.alien_number') !!}</label>
                <input type="text" id="con8_alien_number" class="form-control" placeholder="Alien Number">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con9">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con9_alien_number">{!! trans('quote.step5.1.immigration_documents.alien_number') !!}</label>
                <input type="text" id="con9_alien_number" class="form-control" placeholder="Alien Number">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con10">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con10_sevis_id">{!! trans('quote.step5.1.immigration_documents.sevis_id') !!}</label>
                <input type="text" id="con10_sevis_id" class="form-control" placeholder="SEVIS ID">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="display:none;" class="row immigration-conditions" id="immigration-con11">
            <div class="col-md-6">
              <div class="form-group">
                <label for="con11_sevis_id">{!! trans('quote.step5.1.immigration_documents.sevis_id') !!}</label>
                <input type="text" id="con11_sevis_id" class="form-control" placeholder="SEVIS ID">
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
