@extends('main.terms.base')

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
				<h2 class="text-center"><strong>Advertising Policies</strong></h2>
				<p class="term-content">We want CareParrotters to have fun and to be safe, and those goals drive our Advertising & Promotional Policies. Advertisers must be honest about the products or services their ads promote; they must avoid content that misleads or offends; and they must never compromise our users' privacy. These Policies apply to all ads on CareParrot.</p>
				<h2 class="subheader"><strong>General Rules</strong></h2>
				<p class="term-content">All ads must comply with these Advertising Policies and with CareParrot's Terms of Service, CareCommunity Policies, and Privacy Policy. We may update the Terms, Policies, and any Guidelines from time to time, so please review them regularly.</p>
				<p class="term-content">CareParrot's user base includes teenagers, nonagenarians, and everyone else in between. Advertisers are responsible for ensuring that their ads are suitable for CareParrotters ages 13+ in each geographic area where the ads will run. They're also responsible for ensuring that their ads comply with all applicable laws, industry codes, rules, and regulations in each geographic area where the ads will run. All disclosures in ads must be clear and conspicuous.</p>
				<h2 class="subheader"><strong>Review & Approval</strong></h2>
				<p class="term-content">All ads are subject to CareParrot's review and approval. We reserve the right to reject or remove any ad in our sole discretion for any reason. We also reserve the right to request modifications to any ad, and to require factual substantiation for any claim made in an ad.</p>
				<h2 class="subheader"><strong>Strictly Prohibited Content</strong></h2>
				<p class="term-content">Ads must not infringe the intellectual property, privacy, publicity, copyright, or other legal rights of any person or entity. And they must not be false, misleading, fraudulent, defamatory, or deceptive.</p>
				<p class="term-content">Content that promotes involvement in our site in any fashion and driving simultaneously, or otherwise encourages dangerous behavior (to include but not limited to being intoxicated, drug use, excessive violence, any harm to animals or any exploitation of these subjects), that demeans, degrades, or shows hate toward a particular ethnicity, gender, culture, country, belief, or toward any member of any class (to include but not limited to sensational or disrespectful content), depictions of nudity, sexual behavior, or obscene gestures; deceptive, false, or misleading content, including deceptive claims, offers, or business practices; Any content that directs users to phishing links, malware, or similarly harmful codes or sites that deceives users into providing personal information without their knowledge, under false pretenses, or to companies that resell, trade, or otherwise misuse that personal information, adult products and services, cigarettes (including e-cigarettes), cigars, smokeless tobacco, and other tobacco products, products or services dedicated to selling counterfeit goods or engaging in copyright piracy, get-rich-quick or pyramid schemes or offers or any other deceptive or fraudulent offers, illegal or recreational drugs or drug paraphernalia, firearms, weapons, ammunition, or accessories, ads that promote particular securities or that provide or allege to provide insider tips, and any illegal conduct, product, or enterprise, promotion or reference of alcohol, gambling and games of skill, and lotteries.</p>
				<h2 class="subheader"><strong>Testimonials & Endorsements</strong></h2>
				<p class="term-content">Any testimonials and endorsements contained in ads or in a CareParrot account must comply with all applicable laws, industry codes, rules, and regulations. For example, a clear and conspicuous disclaimer is required if an endorser's results were atypical or if the endorser was paid.</p>
				<h2 class="subheader"><strong>Quality & Content</strong></h2>
				<p class="term-content">All ads must meet the highest editorial quality and standards. All video ads must be full-screen video ads that display in portrait mode or landscape mode.</p>
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
