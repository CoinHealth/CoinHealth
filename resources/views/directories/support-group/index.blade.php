@extends('directories.base')

@push('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/css/directory.css">
@endpush

@section('content.inner')
<div class="directory-container" style="margin-top: 150px;" id="support">

	
	<div class="container">
		<transition v-if="!pageStarted" name="popup">
			<div class="row">
				<div class="col-md-12 text-center">
					<img src="/assets/icons/loading.svg">
				</div>
			</div>
		</transition>
		<transition name="popup" v-else>
			<div class="row">
				<div class="col-md-12">
					@if(session('message'))
						<div class='alert alert-success'>
							<p>{{ session('message') }}</p>
						</div>
					@endif
					<ul class="ds-ul">
						<li>
							<a href="/" class="btn btn-sm btn-primary">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<h1 class="provider-header">Support Groups</h1>
						</li>
						@if(auth()->user())
							@if(auth()->user()->role == 2 || auth()->user()->role == 4)
							<li>
								<a class="btn btn-sm btn-primary btn-submit" 
									role="button" 
									data-toggle="tooltip"
									title="Coming Soon"
									href="#">
									{{-- href="/directory/support-group/new"> --}}
									<i class="fa fa-fw  fa-plus-square" 
										aria-hidden="true">	
									</i> 
									Add Support Group
								</a>
							</li>
							@endif
						@endif
					</ul>
				</div>

				<div class="group-search-container">
					<div class="container">
						<div class="row">
							
						</div>
					</div>
				</div>

				<div class="container">

					<div class="row search-header">
						<div class="col-md-12">
							<span>Search Results</span>
							<paginate
								ref="pagination"
								:page-count="pages"
								:initial-page="page"
								:click-handler="changePage"
								container-class="pagination pagination-sm"
								page-class="page-item">
							</paginate>
						</div>
					</div>

					<div class="row listing">

						<div class="col-md-12" v-if="empty" v-cloak>
							<div class="alert alert-info">
								<p>
									Whoops. We're still working on that specialization. 
									Please choose a different filter.
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>	
		</transition>
		
	</div>
</div>

@endsection

@push('scripts')
	<script src="/js/directory-support-group.js"></script>
	<script type="text/javascript" src="/assets/js/sidebar_btn.js"></script>

@endpush
