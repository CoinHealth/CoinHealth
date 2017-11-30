@extends('main.profile2.base')

@section('styles')
    <link rel="stylesheet" href="/assets/css/sidebar.css">
    <link rel="stylesheet" href="/assets/css/profile2.css">
    <link rel="stylesheet" href="/assets/css/toggle.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,300italic,600,500,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
<div class="row row-update">
	<div class="col-md-12">
		<span class="title">
			Medical History
		</span>
		<a href="javascript:void(0);" class="update">Update</a>
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Height:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Weight:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Blood Type:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Blood Pressure:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Insurance Provider:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Individual or Company:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Pre-existing Condition:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="checkbox" class="toggle-btn" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
	</div>
</div>
<div class="row row-specify-1">
	<div class="col-md-3 label-col">
		<label>Specify:</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Medication:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Preferred Doctor:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Preferred Location:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-12">
		<span class="title">
			Family History
		</span>
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Pre-existing Condition:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="checkbox" class="tgl-check" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="success" data-offstyle="danger">
	</div>
</div>

<div class="row row-specify">
	<div class="col-md-3 label-col">
		<label>Specify:</label>
	</div>
	<div class="col-md-5">
		<input type="text" class="form-control">
	</div>
</div>

<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Medication:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-form">
	<div class="col-md-3 label-col">
		<label>Preferred Doctor:</label>
	</div>
	<div class="col-md-5 input-col">
		<input type="text" class="form-control">
	</div>
</div>
<div class="row row-tc">
	<div class="col-md-12">
		<p class="tc-p"><i class="fa fa-check-circle-o" aria-hidden="true"></i> You have agreed to our <a href="javascript:void(0);" data-toggle="modal" data-target="#tc">Terms and Condition</a></p>
		<a href="" class="view-btn">
			View Suggested Care
		</a>
	</div>
</div>
<div class="row row-sa">
	<div class="col-md-12">
		<a href="javascript:void(0);" class="save-btn">
			Save and Agree
		</a>
		<a href="javascript:void(0);" class="tc-a" data-toggle="modal" data-target="#tc">Terms and Condition</a>
	</div>
</div>

<div class="table-plan">
	<table class="tbl-plan table table-responsive table-condensed table-striped">
		<thead>
			<tr>
				<th>
					Type
				</th>
				<th>
					Name
				</th>
				<th>
					Details
				</th>
				<th>
					Action
				</th>
			</tr>
		</thead>
		<tbody>
            @foreach(auth()->user()->bookmarks as $bookmark)
			<tr>
				<td data-th="Type">
					{{ class_basename($bookmark->bookmarkable_type) }}
				</td>
				<td data-th="Name">
					{{--
                    Blue Cross-Blue Shield <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                    --}}
                    {{ $bookmark->bookmarkable->bookmark_name }}
				</td>
				<td data-th="Details">
					{{ $bookmark->bookmarkable->phone[0] }}
				</td>
				<td data-th="Action">
					<a href="#">Apply</a>
				</td>
			</tr>
            @endforeach
		</tbody>
	</table>
</div>

@include('main.profile2.templates.tcmodal')

@endsection

@section('scripts')
    @include('main.partials.scripts.sidebar')
    <script src="/assets/js/toggle.js"></script>
    <script>
    	$(function() {
		    $('.tgl-check').change(function() {
		    	$('.row-specify').toggle();
		    })

		    $('.toggle-btn').change(function() {
		    	$('.row-specify-1').toggle();
		    })
		})


    </script>
    <script type="text/javascript">
    	$('.update').click(function() {
    		$(this).hide();
    		$('.row-tc').hide();
	        $('.input-col').show();
	        $('.row-sa').show();
	    });

	    $('.save-btn').click(function(){
	    	$('.row-sa').hide();
	    	$('.input-col').hide();
	    	$('.row-tc').show();
	    	$('.update').show();
	    	$('.tgl-check').bootstrapToggle('off');
	    	$('.toggle-btn').bootstrapToggle('off');
	    	$('.row-specify').hide();
	    	$('.row-specify-1').hide();
	    });
    </script>

@endsection
