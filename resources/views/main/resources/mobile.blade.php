@section('content.innermobile')
	<ul class="nav nav-tabs" id="myTabmobile">
		<li class="active">
			<a data-target="#mobiledocuments" data-toggle="tab">
				<img src="/assets/icons/folder.png" alt=""><br>
				<span>DOCUMENTS</span>
			</a>
		</li>
		<li>
			<a data-target="#mobileactivity" data-toggle="tab" href="#activity">
				<img src="/assets/icons/ok.png" alt=""><br>
				<span>ACTIVITY</span>
			</a>
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="mobiledocuments">
			<div class="row">
				<div class="logomobile">
					<img src="/assets/icons/mobile-logo.png" alt="">
				</div>
				<div class="name">
					<p class="name">
						JOHN SMITH
					</p>
					<p class="state">
						Los Angeles, CA
					</p>
				</div>
				<div class="pull-right">
					<div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger"><i class="fa fa-lg fa-cog" aria-hidden="true"></i><i class="fa fa-caret-down" aria-hidden="true"></i></button>
						<ul class="dl-menu">
							<li>
								<a href="#">Settings 1</a>
							</li>
							<li>
								<a href="#">Settings 2</a>
							</li>
							<li>
								<a href="#">Settings 3</a>
							</li>
							<li>
								<a href="#">Settings 4</a>
							</li>
						</ul>
					</div><!-- /dl-menuwrapper -->
				</div>
			</div>

			<div class="row upload-image">
				<a href="#">
					<img src="/assets/icons/upmobile.png" alt="" class="img-circle">
				</a>
			</div>
			<div class="sc-container">
				<div class="row">
					<div class="col-sm-4 col-xs-4">
						<div class="status-box">
							<p class="s-number">2,027 Total</p>
							<p class="s-cat">Total Contributions</p>
						</div>
					</div>
					<div class="col-sm-4 col-xs-4 sc-middle">
						<div class="status-box">
							<p class="s-number">162 Days</p>
							<p class="s-cat">Days Active</p>
						</div>
					</div>
					<div class="col-sm-4 col-xs-4">
						<div class="status-box">
							<p class="s-number">13 People</p>
							<p class="s-cat">Referred Users</p>
						</div>
					</div>
				</div>
			</div>

			<div class="viewing-container">
				<div class="col-sm-12 col-xs-12">
					<div class="view-doc-row">
						<div class="panel panel-default">
	  						<div class="panel-heading">View</div>
	  						<div class="panel-body">
	    						<div class="row">
	    							<div class="col-sm-3 col-xs-6">
	    								<div class="box">
						    				<img src="/assets/icons/doc.png" alt="">
						    				<div class="box-cat">
						    					Receipts
						    				</div>
						    			</div>
	    							</div>
	    							<div class="col-sm-3 col-xs-6">
	    								<div class="box">
						    				<img src="/assets/icons/doc.png" alt="">
						    				<div class="box-cat">
						    					Receipts
						    				</div>
						    			</div>
	    							</div>
	    							<div class="col-sm-3 col-xs-6">
	    								<div class="box">
						    				<img src="/assets/icons/doc.png" alt="">
						    				<div class="box-cat">
						    					Receipts
						    				</div>
						    			</div>
	    							</div>
	    							<div class="col-sm-3 col-xs-6">
	    								<div class="box">
						    				<img src="/assets/icons/doc.png" alt="">
						    				<div class="box-cat">
						    					Receipts
						    				</div>
						    			</div>
	    							</div>
	    						</div>
	  						</div>
						</div>
					</div>
				</div>
			</div>

			<div class="button-container">
				<div class="row">
					<div class="col-sm-6 col-xs-6 pad-right">
						<a href="#" class="btn-upload form-control">UPLOAD</a>
					</div>
					<div class="col-sm-6 col-xs-6 pad-left">
						<a href="#" class="btn-view form-control">VIEW DOCUMENTS</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="mobileactivity">
			bbbb
		</div>
	</div>
@endsection