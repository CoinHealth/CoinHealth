@extends('main.about.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/terms.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
@include('main.terms.header')
@include('main.partials.sidebar')

<div class="about-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="title">
					Fueled by passion for Care and Wellness
				</p>
				<p class="subtitle">
					Finding care shouldn't feel like rocket science.
				</p>
				<p class="fancy"><span>Terms</span></p>
			</div>
		</div>
	</div>
</div>

<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center"><strong>Enrollment Platform Acceptable Use Policy</strong></h1>
				<h2 class="text-center"><strong>Agent & Agency affirms that by using the platform:</strong></h2>
				<p>By using the tools and services for agents provide by <a href="/" class="btn-link">CareParrot.com</a>, agents agree to the following Acceptable Use Policy which may be updated from time to time.</p>
				<p>Only the agent of record may submit enrollments under their name. </p>
				<p>It is the Agents sole responsibility to verify that all information submitted during the setup for their use of the CareParrot.com platform is accurate and that all required licenses and appointments are valid.  A notification of any updates must be directed to CareParrot in a timely fashion. They hold active licenses in all states in which they enroll customers in health insurance plans using our platform, and will provide to CareParrot if requested, documentation verifying licenses and status. All information provided to CareParrot regarding insurance carrier appointments is true and accurate. Agent agrees that any errors in designation of insurance carrier appointments are solely the agents/agencies responsibility and in case of any errors any loss of commissions by agent/agency shall not be held against <a href="/" class="btn-link">CareParrot.com</a>.</p>
				<p>It is required by CMS regulations that CareParrot, as a web broker entity (WBE), must in consumer facing websites display all plans available to a consumer. This means that for agents direct to consumer website, plans may be displayed which the agent is not appointed with. Plans displayed within the agent enrollment website (agent facing) will be limited to those that the agent indicates they are appointed with. Agent will obtain consent for all consumers enrolled and will communicate to the consumer the date the application will be submitted along with the effective date of the coverage. Should a prospect go to the agents Client Facing Site, (i.e. URL assigned to agent or agency), and prospect resides in a state in which agent is not licensed or prospect selects an insurance plan through a carrier with which the agent is not appointed, prospect may be assigned to a local licensed partner of CareParrot at its sole discretion. Agent must be involved in enrollment process and review application for enrollment.</p>
				<p>You have completed all required testing and certifications required by CMS (Center for Medicare/Medicaid Services) and that the FFM number provided is true and accurate. Agent agrees that any errors in the submission of their FFM number is solely the agents/agencies responsibility and in case of any errors any loss of commissions by agent/agency shall not be held against CareParrot.com. They have completed any testing or certifications which insurance carriers might require, including those specific, if applicable, to selling on exchange plans.</p>
				<p>Agent acknowledges that the Errors and Omissions (E&O) insurance policy of CareParrot.com is not liable for any claims against agent while using the CareParrot enrollment platform. It is agents’ responsibility and our recommendation for the agent to secure their own E&O coverage. They will keep all enrolled or prospective consumer information which might be gathered in compliance with CMS and HIPAA guidelines. We are required by Federal law (45 CFR 155.220), to report regulator violations to CMS. Penalties can result in possible forfeiture of insurance licenses and other damages.</p>
				<div class="back">
					<a href="/askparrot" class="a-back">
						<img src="/assets/icons/back.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script type="text/javascript" src="/assets/js/about.js"></script>
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
