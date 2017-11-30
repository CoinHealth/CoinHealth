@extends('main.about.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/terms.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
{{-- <link rel="stylesheet" type="text/css" href="/assets/css/health.css"> --}}
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
			<div class="col-md-12 terms-col">
				<h2 class="text-center"><strong>Cookie Policy</strong></h2>
				<p class="term-content">Our privacy policy explains how we collect and use information from and about you when you use the CareParrot services. We have provided this cookie policy to tell you more about why we use cookies and other similar identifying technologies, the types of cookies and similar technologies we use, and your choices in relation to these technologies.</p>
				<h4 class="subheader">Cookie Overview</h4>
				<p class="term-content">A cookie is a small piece of data that is sent to your browser or device by websites, mobile apps, and advertisements that you access or use. This data is stored on your browser or device and helps websites and mobile apps remember things about you. For example, cookies may help us remember certain preferences you have selected, such as your language preference.</p>
				<h4 class="subheader">Our Use of Cookies</h4>
				<p class="term-content">Like most online services, CareParrot uses cookies for a number of reasons, like protecting your data and account, helping us see which features are most popular, counting visitors to a page, improving our users’ experience, keeping our services secure, and just generally providing you with a better, more intuitive, and satisfying experience. The cookies we use generally fall into one of the following categories. </p>
				<h4 class="subheader">Why we use these cookies</h4>
				<dl>
					<dt>Preferences</dt>
					<dd>We use these cookies to remember your settings and preferences (like languages).</dd>
					<dt>Security</dt>
					<dd>We use these cookies to help identify and prevent security risks. </dd>
					<dt>Performance</dt>
					<dd>We use these cookies to collect information about how you interact with our services and to help us improve them.</dd>
					<dt>Analytics </dt>
					<dd>We use these cookies to help us improve our services.</dd>
					<dt>Advertising</dt>
					<dd>We use these cookies to deliver advertisements, to make them more relevant and meaningful to consumers, and to track the efficiency of our advertising campaigns, both on our services and on other websites or mobile apps. See Advertising Policy</dd>
					<dt>Pixels, Local Storage, and Other Similar Technologies</dt>
					<dd>We may also use other similar technologies on our services, such as pixel tags and local storage. We use these technologies to do things like help us see what features are most popular, create a more personalized experience, and deliver relevant ads. Pixel tags (also called clear GIFs, web beacons, or pixels) are small blocks of code installed in or on a webpage, mobile app, or advertisement. These tags can retrieve certain information about your browser and device such as: operating system, browser type, device type and version, referring website, website visited, IP address, and other similar information. Local storage is an industry-standard technology that allows a website or mobile app to store and retrieve data on an individual’s computer, mobile phone, or other device.</dd>
				</dl>
				<h4 class="subheader">Your Choices</h4>
				<p class="term-content">Your browser probably lets you choose whether to accept browser cookies. And you may even be able to choose or limit the use of cookies and other similar technologies in mobile apps. But these technologies are an important part of how our services work, so removing or rejecting cookies, or limiting the use of other similar technologies could affect the availability and functionality of our services.</p>
				<h4 class="subheader">Web browser opt-out</h4>
				<p class="term-content">
					Most web browsers are set to accept cookies by default. If you don’t want to allow cookies you may have some options. Your browser may provide you with a set of tools to manage cookies. You can usually set your browser to refuse some cookies or all cookies. For example, some browsers give you the option to allow first-party cookies but block third-party cookies. So what is the difference between first-party and third-party cookies?
				</p>
				<p class="term-content">
					"Third-party" cookie is served by a company that doesn’t operate the page or domain you are visiting. So for example, when you visit CareParrot.com and Google serves a cookie on CareParrot.com for CareParrot’s analytics that is a third-party cookie.
				</p>
				<p class="term-content">
					You may also be able to remove cookies from your browser. Your ability to manage cookies through a mobile browser, however, may be limited. For more information about how to manage your cookie settings, please follow the instructions provided by your browser which are usually located within the <strong>“Help,” “Tools,” or “Edit”</strong> settings.
				</p>
				<h4 class="subheader">
					Mobile device opt-outs
				</h4>
				<p class="term-content">
					Your mobile operating system may let you opt-out from having your information collected or used for interest-based advertising on mobile devices. You should refer to the instructions provided by your mobile device’s manufacturer; this information is typically available under the <strong>“settings”</strong> function of your mobile device.
				</p>
				<h4 class="subheader">
					Contact Us
				</h4>
				<p class="term-content">If you have any questions about our use of cookies, please contact us at <a href="mailto:help@careparrot.com?subject=Hello!"><span class="text-info">help@careparrot.com</span></a>.</p>
				<h4 class="subheader">
					Third-Party Applications and Plugins
				</h4>
				<p class="term-content">
					Third-party applications and plugins that are not supported by CareParrot (found through <a href="/careconnect" target="_blank"><strong class="text-info">CareParrot's "CareConnect"</strong></a>) and can compromise the security of your account. Please see our Terms of Service for more information.
				</p>
				<p class="term-content">
					A third-party application is any app that isn't the official CareParrot application, but using your CareParrot login information (username and password) to access CareParrot services. A plugin is an add-on that creates additional functionalities that are not included in the official CareParrot application.
				</p>
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
