@extends('main.resources.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/resources.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
<div class="main-header">
	<div class='main-cp-icon col-xs-12'>
		<a href="/">
			<img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
		</a>
	</div>
</div>

@include('main.partials.sidebar')
	<div class="calendar-upper">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="title">{!! trans('resource_center.coverage') !!}</p>
					<div class="date-div">
						<p>
							{!! trans('resource_center.date_1') !!}
						</p>
					</div>
					<div class="date-div">
						<p>
							{!! trans('resource_center.date_2') !!}
						</p>
					</div>
					<div class="date-div">
						<p>
							{!! trans('resource_center.date_3') !!}
						</p>
					</div>
				</div>
				<div class="col-md-offset-3 col-md-3">
					<p class="info">
						{!! trans('resource_center.deadlines') !!}
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="calendar-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="bottom-title">
						{!! trans('resource_center.window') !!}
					</p>
				</div>
			</div>
			<div class="row">
				<div id="no-more-tables">
		            <table class="col-md-12 table-bordered table-striped table-condensed cf">
		        		<thead class="cf top">
		        			<tr>
		        				<th colspan="9">2016</th>
		        				<th colspan="4">2017</th>
		        			</tr>
		        		</thead>
		        		<thead class="cf month">
		        			<tr>
		        				<th>{!! trans('resource_center.Apr') !!}</th>
		        				<th>{!! trans('resource_center.May') !!}</th>
		        				<th>{!! trans('resource_center.Jun') !!}</th>
		        				<th>{!! trans('resource_center.Jul') !!}</th>
		        				<th>{!! trans('resource_center.Aug') !!}</th>
		        				<th>{!! trans('resource_center.Sep') !!}</th>
		        				<th>{!! trans('resource_center.Oct') !!}</th>
		        				<th>{!! trans('resource_center.Nov') !!}</th>
		        				<th>{!! trans('resource_center.Dec') !!}</th>
		        				<th>{!! trans('resource_center.Jan') !!}</th>
		        				<th>{!! trans('resource_center.Feb') !!}</th>
		        				<th>{!! trans('resource_center.Mar') !!}</th>
		        				<th>{!! trans('resource_center.Apr') !!}</th>
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<tr>
		        				<td data-title="Apr 2016"></td>
		        				<td data-title="May 2016"></td>
		        				<td data-title="Jun 2016"></td>
		        				<td data-title="Jul 2016"></td>
		        				<td data-title="Aug 2016"></td>
		        				<td data-title="Sep 2016"></td>
		        				<td data-title="Oct 2016"></td>
		        				<td data-title="Nov 2016 to Jan 2017" colspan="3" class="colspan-data">
		        					{!! trans('resource_center.open_registration') !!}
		        				</td>
		        				<td data-title="Feb 2017"></td>
		        				<td data-title="Mar 2017"></td>
		        				<td data-title="Apr 2017"></td>
		        			</tr>
		        		</tbody>
		        	</table>
		        </div>
		        <div class="table-mobile">

		        </div>
			</div>
			<div class="row">
				<div class="col-md-12 bottom-cal">
					<p class="link-p">{!! trans('resource_center.life_event') !!}</p>
				</div>
			</div>
			<div class="row">
				<div class="back-a-blue">
					<a href="/askparrot"><img src="/assets/icons/back.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
