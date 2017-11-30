<div class="col-md-12 step-parent text-center">
	<div class="row">
		<div class="col-md-12 filter-header">			
			<div class="row-eq-height">
				<div class="col-md-2 text-right">
					<p>Filter By</p>
				</div>
				<div class="col-md-8">
					<div class="col-md-5">
						<div class="form-group">
							<label>Networks</label>
							<div>
								<label for="hmo">
									<input type="checkbox" name="networks" id="hmo">
									HMO
								</label>
								<label for="ppo">
									<input type="checkbox" name="networks" id="ppo">
									PPO
								</label>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Aetna">
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<button type="button" class="btnSave btn btn-xs">Save & Exit</button>
					</div>
				</div>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12 insurer">
				<ul class="nav nav-tabs nav-justified" role="tablist">
			    <li role="presentation" id="nav-compare">
			    	<a href="#">Compare <i class="fa fa-play"></i></a>
			    </li>
			    <li role="presentation" id="nav-bronze">
			    	<a href="#bronze" aria-controls="bronze" role="tab" data-toggle="tab">Bronze</a>
			    </li>
			    <li role="presentation" id="nav-silver">
			    	<a href="#silver" aria-controls="silver" role="tab" data-toggle="tab">Silver</a>
			    </li>
			    <li role="presentation" id="nav-gold">
			    	<a href="#gold" aria-controls="gold" role="tab" data-toggle="tab">Gold</a>
			    </li>
			    <li role="presentation" id="nav-platinum">
			    	<a href="#platinum" aria-controls="platinum" role="tab" data-toggle="tab">Platinum</a>
			    </li>
			    <li role="presentation" id="nav-catasthropic"> 
			    	<a href="#catasthropic" aria-controls="catasthropic" role="tab" data-toggle="tab">Catasthropic</a>
			    </li>
			  </ul>
	  		<div class="row text-center">
	  			<div class="col-md-2"><p>INSURER</p></div>
	  			<div class="col-md-2"><p>YOUR PORTION</p></div>
	  			<div class="col-md-2"><p>CO-PAY PRIMARY / SPECIALIST</p></div>
	  			<div class="col-md-2"><p>RX CO-PAY GENERIC BRAND</p></div>
	  			<div class="col-md-2"><p>DEDUCTIBLE</p></div>
	  			<div class="col-md-2"><p>ENROLL / RATING</p></div>
	  		</div>
			  <div class="tab-content">
			  	
			  	<div role="tabpanel" class="tab-pane fade in active" id="bronze">
			  		<div class="insurer-container text-center">
			  			<div class="col-md-12">
			  				<div class="insurer-container">
			  					<div class="row-eq-height">
				  					<div class="col-md-2 insurer-name">
				  						<label for="bronze-insurer-name1">
				  							<input type="checkbox" id="bronze-insurer-name1">
				  							<img src="/assets/icons/insurer1.png" alt="" class="img-responsive">
				  						</label>
				  					</div>
				  					<div class="col-md-2 insurer-portion">
				  						<h3>$100</h3>
				  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
				  					</div>
				  					<div class="col-md-2 insurer-co-pay">
				  						<h3>$10</h3>
				  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
				  					</div>
				  					<div class="col-md-2 insurer-rx-co-pay">
				  						<h3>$10</h3>
				  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
				  					</div>
				  					<div class="col-md-2 insurer-deductible">
				  						<h3>$10</h3>
				  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
				  					</div>
				  					<div class="col-md-2 insurer-rating">
				  						<h4>A+<span class='hearts'>
													<i class='fa fa-heart'></i>
													<i class='fa fa-heart'></i>
													<i class='fa fa-heart'></i>
													<i class='fa fa-heart'></i>
													<i class='fa fa-heart'></i>
												</span></h4>
											<button type="button" class="btn btn-xs btn-success">Enroll</button>
				  					</div>
				  				</div>
				  				<div class="row-eq-height search-buttons">
				  					<div class="col-md-4">
				  						<div class="extra">
					  						<p class="provider-search ">
													<img src="/assets/icons/quotes/search1.png" class="img-responsive pull-left">
													<em>Provider Search</em>
													<i class="fa fa-search pull-right"></i>
												</p>
												<div class="search-container"></div>
											</div>
				  					</div>
				  					<div class="col-md-4">
				  						<div class="extra">
					  						<p class="rx-search ">
													<img src="/assets/icons/quotes/search2.png" class="img-responsive pull-left">
													<em>RX Search</em>
													<i class="fa fa-search pull-right"></i>
												</p>
												<div class="search-container"></div>
											</div>
				  					</div>
				  					<div class="col-md-4">
				  						<div class="extra">
					  						<p class="provider-search ">
													<img src="/assets/icons/quotes/search3.png" class="img-responsive pull-left">
													<em>Summary of benefits</em>
													<i class="fa fa-search pull-right"></i>
												</p>
											</div>
				  					</div>
				  					<div class="col-md-4">
				  						<div class="extra">
					  						<p class="provider-search ">
													<img src="/assets/icons/quotes/search4.png" class="img-responsive pull-left">
													<em>Provider Search</em>
													<i class="fa fa-search pull-right"></i>
												</p>
											</div>
				  					</div>
				  				</div>
			  				</div>
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="bronze-insurer-name2">
			  							<input type="checkbox" id="bronze-insurer-name2">
			  							<img src="/assets/icons/insurer2.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$110</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$11</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  			</div>

			  		</div>
			  	</div>

			  	<div role="tabpanel" class="tab-pane fade" id="silver">
			  		<div class="insurer-container text-center">
			  			<div class="col-md-12">
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="silver-insurer-name1">
			  							<input type="checkbox" id="silver-insurer-name1">
			  							<img src="/assets/icons/insurer1.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$100</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$10</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="silver-insurer-name2">
			  							<input type="checkbox" id="silver-insurer-name2">
			  							<img src="/assets/icons/insurer2.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$110</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$11</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  			</div>

			  		</div>
			  	</div>

			  	<div role="tabpanel" class="tab-pane fade" id="gold">
			  		<div class="insurer-container text-center">
			  			<div class="col-md-12">
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="gold-insurer-name1">
			  							<input type="checkbox" id="gold-insurer-name1">
			  							<img src="/assets/icons/insurer1.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$100</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$10</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="gold-insurer-name2">
			  							<input type="checkbox" id="gold-insurer-name2">
			  							<img src="/assets/icons/insurer2.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$110</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$11</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  			</div>

			  		</div>
			  	</div>
			  	
			  	<div role="tabpanel" class="tab-pane fade" id="platinum">
			  		<div class="insurer-container text-center">
			  			<div class="col-md-12">
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="platinum-insurer-name1">
			  							<input type="checkbox" id="platinum-insurer-name1">
			  							<img src="/assets/icons/insurer1.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$100</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$10</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="platinum-insurer-name2">
			  							<input type="checkbox" id="platinum-insurer-name2">
			  							<img src="/assets/icons/insurer2.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$110</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$11</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  			</div>

			  		</div>
			  	</div>

			  	<div role="tabpanel" class="tab-pane fade" id="catasthropic">
			  		<div class="insurer-container text-center">
			  			<div class="col-md-12">
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="catasthropic-insurer-name1">
			  							<input type="checkbox" id="catasthropic-insurer-name1">
			  							<img src="/assets/icons/insurer1.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$100</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$10</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$10</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  				<div class="row-eq-height insurer-container">
			  					<div class="col-md-2 insurer-name">
			  						<label for="catasthropic-insurer-name2">
			  							<input type="checkbox" id="catasthropic-insurer-name2">
			  							<img src="/assets/icons/insurer2.png" alt="" class="img-responsive">
			  						</label>
			  					</div>
			  					<div class="col-md-2 insurer-portion">
			  						<h3>$110</h3>
			  						<p class="small">Eligible <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Free Preventative <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rx-co-pay">
			  						<h3>$11</h3>
			  						<p class="small">Pediatric Dental <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-deductible">
			  						<h3>$11</h3>
			  						<p class="small">Vision <i class="fa fa-check-circle-o"></i></p>
			  					</div>
			  					<div class="col-md-2 insurer-rating">
			  						<h4>A+<span class='hearts'>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
												<i class='fa fa-heart'></i>
											</span></h4>
										<button type="button" class="btn btn-xs btn-success">Enroll</button>
										
			  					</div>
			  				</div>
			  			</div>

			  		</div>
			  	</div>
			  </div>
			</div>
		</div>
		<div class="col-md-12 mg-top-20">
			<div class="form-group">
				<button type="button" class="btn btn-primary">Save & Exit</button>
				<button type="button" data-step="#step3_1" class="nextBtn btn btn-success">Continue</button>
			</div>
		</div>
	</div>
</div>

<!-- <div class="extra text-left">
	<p class="provider-search">
		<img src="/assets/icons/quotes/search1.png" class="img-responsive pull-left">
		<em>Provider Search</em>
		<i class="fa fa-search pull-right"></i>
	</p>
	<p class="rx-search">
		<img src="/assets/icons/quotes/search2.png" class="img-responsive pull-left">
		<em>RX Search</em>
		<i class="fa fa-search pull-right"></i>
	</p>
	<p class="summary-benefits">
		<img src="/assets/icons/quotes/search3.png" class="img-responsive pull-left">
		<em>Summary of Benefits</em>
	</p>
	<p class="email-plan">
		<img src="/assets/icons/quotes/search4.png" class="img-responsive pull-left">
		<em>Email plan</em>
	</p>
</div> -->