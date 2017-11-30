@extends('directories.base')

@push('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/css/directory.css">
<link rel="stylesheet" href="/assets/css/agent-finder.css"> <!-- cath's note: fixed css and remove this-->
<!-- <link rel="stylesheet" href="/assets/css/carenow/search.css"> -->

@endpush

@section('content.inner')
<div class="directory-container" style="margin-top: 150px;" id="agent">

	<modal-preview></modal-preview>
	<modal-save></modal-save>
	<modal-premium></modal-premium>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(session('message'))
					<div class='alert alert-success'>
						<p>{{ session('message') }}</p>
					</div>
				@endif
				<ul class="ds-ul">
					<li>
						<a href="/" class="btn btn-primary">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</a>
					</li>
					<li>
						<h1 class="provider-header">Agent Search</h1>
					</li>
					<button class="btn btn-warning" 
						v-show="agentRole" 
						@click="submit">
						Premium Listing
					</button>
				</ul>
			</div>

			<div class="provider-search-container">
				<div class="container">
					<div class="row">
						<form action="">
							<div class="col-md-4">
								<input type="text" 
									v-model="searchInput" 
									class="form-control" 
									placeholder="Name">
							</div>
							<div class="col-md-3">
								<input type="text" 
									v-model="searchState" 
									maxlength="2" 
									class="form-control" 
									placeholder="State">
							</div>
							<div class="col-md-3">
								<input type="text" 
								v-model="searchCity" 
								class="form-control" 
								placeholder="City">
							</div>
							<div class="col-md-2 searchButtons">
								<button type="button" 
									class="btn btn-primary form-control" 
									@click="search">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
								<button type="button" 
									class="btn btn-danger form-control" 
									@click="clear()">
									<i class="fa fa-times" aria-hidden="true"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="container">

				<div class="row search-header">
					<div class="col-md-12">
						<span>Search Results</span>	
						<!-- <paginator v-on:page-change="changePage" :pages="pages" :current-page="page" class="pagination-sm"></paginator> -->
					</div>
				</div>

				<div class="row listing">
					<transition-group name="fade-out">
						<agent-card v-for="agent in agents" :key="agent.id" :agent="agent"></agent-card>
					</transition-group>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
	<script src="/js/directory-agent.js"></script>
	<script type="text/javascript" src="/assets/js/sidebar_btn.js"></script>
	
@endpush
