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
			<div class="col-md-12 terms-col">
				<h2 class="text-center"><strong>HIPAA Policy</strong></h2>
				<h3><strong>Privacy Policy</strong></h3>
				<h4 class="subheader"><strong>Data Privacy Protection</strong></h4>
				<p class="term-content">CareParrot understands how important your privacy is to you. We are committed to protecting any personal information that you provide us on this website according to applicable laws, regulations and accreditation standards and practices. We are constantly evaluating new safeguards for protecting your information. We urge you to read our Privacy Policy so that you will understand both our commitment to you and your privacy, and how you can participate in that commitment.</p>
				<h2 class="text-center"><strong>HIPAA Privacy</strong></h2>
				<h4 class="subheader">Who has access to my Personally Identifiable Information</h4>
				<p class="term-content">Authorized employees may access your information to administer our services. All of our authorized employees must sign an agreement to follow our Policies that includes our nondisclosure and confidentiality agreement.</p>
				<p class="term-content">We may work with other 3rd parties to help us conduct our business. We are required by law to sign an agreement with these external companies that prohibits them from using or giving out information for any reason other than the purpose of the contract. </p>
				<p class="term-content">For example, we may contract with:</p>
				<ol>
					<li>Print or mail services for customer communications</li>
					<li>Audit or consulting firms for validating the integrity of our processes</li>
					<li>We are permitted or required by law to make certain other uses and disclosures of your PHI without your consent or authorization as follows:</li>
					<li>For any purpose required by law</li>
					<li>If required to do so by subpoena or discovery request</li>
				</ol>
				<h4 class="subheader">How is my Personally Identifiable Information protected?</h4>
				<p class="term-content">It is our policy to keep all information about you confidential. It is so important to us that we take the following steps: Our employees sign an agreement to follow our Rules of Engagement to include strict adherence to confidentiality. We use internal and external auditing (auditors) that reviews our privacy practices. We have information technology security systems in-place to detect and prevent security breaches. All computer systems have security protection configured and installed. All data that you enter on our site is encrypted with the industry-standard encryption technology. By encrypting your data, your data is protected while being transferred over the Internet to our servers. Once your data reaches our servers, the same state-of-the art security software that guards our company's essential business data protects your data as well.</p>
				<h4 class="subheader">Non-Personal Data Collected Automatically</h4>
				<p class="term-content">When you access our web sites, we may automatically collect non-personal data (e.g. type of browser and OS used, domain name of the web site from which you came, number of visits, average time spent on the site, pages viewed). This information is used internally to improve our web sites performance or content.</p>
				<h2 class="text-center"><strong>Your Rights</strong></h2>
				<p>The records we maintain about your health are the property of <a href="/" class="btn-link">CareParrot</a>. To protect your privacy, we shall check and verify your identity when you have questions or issues about your records.</p>
				<h4 class="subheader">Right to Inspect and Copy</h4>
				<p class="term-content">You have the right to request a copy of the PHI that we keep on your behalf. All requests to inspect or copy must be made in writing and signed by you with proof of government issued form of identification. </p>
				<h4 class="subheader">Right to Amend</h4>
				<p class="term-content">You have the right to request in writing that the PHI we maintain about you be amended or corrected. All requests must be in writing be signed by you with proof of government issued form of identification, and must state the reasons for the amendment or correction.</p>
				<h4 class="subheader">Right to Notice of a Breach of Information</h4>
				<p class="term-content">We are required to notify you by first class mail or e-mail (if you have told us you prefer to receive information by e-mail), of a breach of your PHI data. A breach is any unauthorized acquisition, access, use, or disclosure of information that compromises the security or privacy of your PHI data.</p>
				<h4 class="subheader">Changes to This Notice</h4>
				<p class="term-content">We reserve the right to change the terms of this Notice of Privacy as necessary and to make the new notice effective for all PHI data maintained by us. You may obtain a copy of the current notice from <a href="/" target="_blank">www.careparrot.com</a>, or by mailing a request to the address listed below.</p>
				<h4 class="subheader">Requests and/or Complaint process</h4>
				<p class="term-content">If you have a question, complaint, request to inspect/amend records, or if you believe your privacy rights have been violated, you may contact the CareParrot Privacy Team via email <a href="mailto:help@careparrot.com?subject=Hello" target="_top" class="btn-link">help@careparrot.com</a></p>
				<h4 class="subheader">Cookies</h4>
				<p class="term-content">See our <a href="/terms/cookie-policy" target="_blank" class="btn-link">Cookie Policy</a></p>
				<h4 class="subheader">How to Opt Out of Cookies</h4>
				<p class="term-content">If you do not wish to receive cookies, please configure your browser to erase all cookies from your computer's hard drive, block all cookies or to receive a warning before a cookie is stored. If you opt out of cookies, you will still have access to all information and resources on CareParrot and your <a href="/profile" target="_blank" class="btn-link">CareParrot profile</a>.</p>
				<h4 class="subheader">IP Addresses</h4>
				<p class="term-content">We collect and log the IP address of all visitors to our websites. An IP address is a number automatically assigned to your computer whenever you access the Internet. IP addresses allow computers and servers to recognize and communicate with one another. We collect IP address information so that we can properly administer our systems and gather aggregate information about how our site is being used, including the pages visitors are viewing. This information is not shared outside of CareParrot. We do not link IP addresses with records containing personal information. We will use IP address information, however, to personally identify you in order to enforce our legal rights or when required to do so by law enforcement authorities.</p>
				<h4 class="subheader">Your Consent</h4>
				<p class="term-content">By using our website, you are responsible for providing CareParrot with accurate, relevant, quality, and complete personal information. You also, by using our website, consent to the collection and use of the information discussed above by CareParrot. Changes in this policy will be posted on this page so that you may always be aware of what information is being collected, how it is being used, and under what circumstances it is being disclosed.</p>
				<h4 class="subheader">Third Party Sites</h4>
				<p class="term-content">CareParrot may contain links to other web sites. We are not responsible for the privacy practices or the content of other web sites.</p>

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
