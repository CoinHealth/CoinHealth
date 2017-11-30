<div class="main-header">
  <div class='header col-xs-12'>
    <div class="main-cp-icon col-xs-11">
	    <a href="/">
	      <img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
	    </a>
    </div>
    <div class="col-xs-1 pull-right">
	    @if(auth()->user())
		    <a href="/auth/logout" class="btn btn-warning btn-xs btn-logout">Sign Out</a>


		    <div class="btn-group" role="group">
			    <div class="button_container dropdown-toggle" id="toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <label>
	                  <span class="top"></span>
	                  <span class="middle"></span>
	                  <span class="bottom"></span>
	                </label>
	            </div>
			    <div class="dropdown-menu" aria-labelledby="toggle">
			      	<a class="dropdown-item" href="/profile">Dashboard</a>
                    <a href="/team-builder" class="dropdown-item">Team Builder</a>
				  	@if(auth()->user()->purpose == 1)
						<a href="/profile/medical" class="dropdown-item">Medical</a>
						<a href="/profile/coverage" class="dropdown-item">Coverage</a>
						<a href="/profile/directory" class="dropdown-item">Directories</a>
					@elseif(auth()->user()->purpose == 2 || auth()->user()->purpose == 4)
						@if (auth()->user()->subscribed('ehr') && !auth()->user()->subscription('ehr')->cancelled())
						<a href="/profile/patients" class="dropdown-item">Patients</a>
						<a href="/profile/appointments" class="dropdown-item">Appointments</a>
						<a href="/profile/staff" class="dropdown-item">Staff</a>
						<a href="/profile/leads" class="dropdown-item">Leads</a>
						<a href="/profile/payments" class="dropdown-item">Billing</a>
						@else
						<a href="/profile/leads" class="dropdown-item">Leads</a>
						@endif
					@elseif(auth()->user()->purpose == 3)
						@if (auth()->user()->subscribed('crm') && !auth()->user()->subscription('crm')->cancelled())
							<a href="/profile" class="dropdown-item">Leads</a>
							<a href="/profile" class="dropdown-item">Clients</a>
							<a href="/profile" class="dropdown-item">Task</a>
							<a href="/profile" class="dropdown-item">Calendar</a>
						@endif
					@endif
					<a href="/home/contact" target="_blank" class="dropdown-item">CareParrot Help</a>
					<a href="/profile/leaderboards" class="dropdown-item">Leaderboard</a>
			      	<a class="dropdown-item" href="/auth/logout">Sign Out</a>

			    </div>

			   <!--   <div class="button_container" id="toggle">
	                <label>
	                  <span class="top"></span>
	                  <span class="middle"></span>
	                  <span class="bottom"></span>
	                </label>
	              </div>
 -->

			</div>
    	@endif
    </div>
  </div>
</div>

	<!-- <div class="overlay" id="overlay">
	  <nav class="overlay-menu">
	    <ul>
	      <li ><a href="/auth/login">Log-in</a></li>
	      <li><a href="/auth/register">Sign Up</a></li>
	    </ul>
	  </nav>
	</div> -->
