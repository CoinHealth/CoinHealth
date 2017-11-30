@extends('directories.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/css/directory.css">
@endsection

@section('content.inner')
	
<div class="directory-container" style="margin-top: 150px;" id="create">	
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">

				<div class="doctor-wrapper">
					@if (session('message'))
						<div class='alert alert-success'>
							<p>{{ session('message') }}</p>
						</div>
					@endif

					<div class="panel panel-info">
						<div class="panel-heading doc-heading">
							Join Our Support Groups
						</div>
						<div class="panel-body doc-body">
							<form method="post" action="/directory/support-group/new" id="addProviderForm">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="row">
									{{-- <div class="form-group col-md-6">
										<label>Prefix </label>
										<input type="text" id="" class="form-control" name="prefix" required>
									</div>
									<div class="form-group col-md-6">
										<label>Degree </label>
										<input type="text" id="" class="form-control" name="degree" required>
									</div> --}}
								</div>
								<div class="row">
									<div class=" col-md-12">
										<div class="pull-right">
											<button type="button" 
												class="btn btn-primary btn-submit">
												Submit
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
