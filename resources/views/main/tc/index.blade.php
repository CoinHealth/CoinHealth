@extends('main.tc.partials.base')

@section('styles')
	<link rel='stylesheet' href='/assets/css/newsidebar.css' />
	<link rel='stylesheet' href='/assets/css/newterms.css' />
@endsection

@section('content')
@include('main.tc.partials.sidebar')
<a href="javascript:void(0);" class="slide-btn">
	<i class="fa fa-angle-down fa-2x" aria-hidden="true"></i>
</a>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="terms-container">
				<p class="title">
					Terms and Conditions
				</p>
				<p class="subtitle">
					Permission for information submitted
				</p>
				<p class="content">
					By submitting this application, you represent that you have permission from all of the people whose information is on the application to both submit their information to the Marketplace, and receive any communications about their eligibility and enrollment.
				</p>

				<p class="subtitle">
					Privacy Act Statement – effective 10/1/2013
				</p>
				<p class="content">
					We are authorized to collect the information on this form and any supporting documentation, including social security numbers, under the Patient Protection and Affordable Care Act (Public Law No. 111-148), as amended by the Health Care and Education Reconciliation Act of 2010 (Public Law No. 111-152), and the Social Security Act.
				</p>
				<p class="content">
					We need the information provided about you and the other individuals listed on this form to determine eligibility for: (1) enrollment in a qualified health plan through the Federal Health Insurance Marketplace, (2) insurance affordability programs (such as Medicaid, CHIP, advance payment of the premium tax credits, and cost sharing reductions), and (3) certifications of exemption from the individual responsibility requirement. As part of that process, we will verify the information provided on the form, communicate with you or your authorized representative, and eventually provide the information to the health plan you select so that they can enroll any eligible individuals in a qualified health plan or insurance affordability program. We will also use the information provided as part of the ongoing operation of the Marketplace, including activities such as verifying continued eligibility for all programs, processing appeals, reporting on and managing the insurance affordability programs for eligible individuals, performing oversight and quality control activities, combatting fraud, and responding to any concerns about the security or confidentiality of the information.
				</p>
				<p class="content">
					While providing the requested information (including social security numbers) is voluntary, failing to provide it may delay or prevent your ability to obtain health coverage through the Marketplace, advance payment of the premium tax credits, cost sharing reductions, or an exemption from the shared responsibility payment. If you don’t have an exemption from the shared responsibility payment and you don’t maintain qualifying health coverage for three months or longer during the year, you may be subject to a penalty. If you don’t provide correct information on this form or knowingly and willfully provide false or fraudulent information, you may be subject to a penalty and other law enforcement action.
				</p>
				<p class="content">
					In order to verify and process applications, determine eligibility, and operate the Marketplace, we will need to share selected information that we receive outside of CMS, including to:
				</p>
				<ul>
					<li>Other federal agencies, (such as the Internal Revenue Service, Social Security Administration</li>
					<li>Department of Homeland Security)</li>
					<li>State agencies (such as Medicaid or CHIP) or local government agencies.</li>
				</ul>
				<p class="content">
					We may use the information you provide in computer matching programs with any of these groups to make eligibility determinations, to verify continued eligibility for enrollment in a qualified health plan or Federal benefit programs, or to process appeals of eligibility determinations. Information provided by applicants won’t be used for immigration enforcement purposes;
				</p>
				<ul>
					<li>Other verification sources including consumer reporting agencies;</li>
					<li>Employers identified on applications for eligibility determinations;</li>
					<li>Applicants/enrollees, and authorized representatives of applicants/enrollees;</li>
					<li>Agents, Brokers, and issuers of Qualified Health Plans, as applicable, who are certified by CMS who assist applicants/enrollees;</li>
					<li>CMS contractors engaged to perform a function for the Marketplace; and</li>
					<li>Anyone else as required by law or allowed under the Privacy Act System of Records Notice associated with this collection (CMS Health Insurance Exchanges System (HIX), CMS System No. 09-70-0560, as amended, 78 Federal Register, 8538, March 6, 2013, and 78 Federal Register, 32256, May 29, 2013).</li>
				</ul>

				<p class="subtitle">
					Identity Verification
				</p>
				<p class="content">
					To protect your privacy, you will need to complete Identity Verification successfully before requesting higher account privileges. You are providing consent to Experian, an external identity verification provider, to access your personal information to conduct ID Verification on behalf of CMS. Below are a few items to keep in mind.
				</p>
				<p class="content">
					Ensure that you have entered your legal name, current home address, primary phone number, date of birth, and email address correctly. We will collect personal information only to verify your identity with Experian.
				</p>
				<p class="content">
					Identity Verification involves Experian using information from your consumer report profile to help confirm your identity. As a result, you may see an entry called a “soft inquiry” on your Experian consumer report. Soft inquiries are visible only to you, will never be presented to third parties, and do not affect your credit score. The soft inquiry will be titled “CMS Proofing Services” and will be removed from your Experian consumer report after 25 months.
				</p>
				<p class="content">
					You may need to have access to your personal and consumer report information, as the Experian application will pose questions to you, based on data in their files.
				</p>
				<p class="content">
					To protect your privacy, you will need to complete Identity Verification successfully before requesting higher account privileges. You are providing consent to Experian, an external identity verification provider, to access your personal information to conduct ID Verification on behalf of CMS. Below are a few items to keep in mind. <a href="https://www.healthcare.gov/how-we-use-your-data">https://www.healthcare.gov/how-we-use-your-data.</a>
				</p>

				<p class="subtitle">
					Advertising Policies
				</p>
				<p class="content">
					We want Careparrot users to have fun and to be safe, and those goals drive our Advertising & Promotional Policies. Advertisers must be honest about the products or services their ads promote; they must avoid content that misleads or offends; and they must never compromise our users' privacy. These Policies apply to all ads on Careparrot.
				</p>

				<p class="subtitle">
					General Rules
				</p>
				<p class="content">
					All ads must comply with these Advertising Policies and with Careparrot's Terms of Service, CareCommunity Policies, and Privacy Policy. We may update the Terms, Policies, and any Guidelines from time to time, so please review them regularly.
				</p>
				<p class="content">
					Careparrot's user base includes teenagers, nonagenarians, and everyone else in between. Advertisers are responsible for ensuring that their ads are suitable for Careparrot users ages 13+ in each geographic area where the ads will run. They're also responsible for ensuring that their ads comply with all applicable laws, industry codes, rules, and regulations in each geographic area where the ads will run. All disclosures in ads must be clear and conspicuous.
				</p>

				<p class="subtitle">
					Review &amp; Approval
				</p>
				<p class="content">
					All ads are subject to Careparrot's review and approval. We reserve the right to reject or remove any ad in our sole discretion for any reason. We also reserve the right to request modifications to any ad, and to require factual substantiation for any claim made in an ad.
				</p>

				<p class="subtitle">
					Strictly Prohibited Content
				</p>
				<p class="content">
					Ads must not infringe the intellectual property, privacy, publicity, copyright, or other legal rights of any person or entity. And they must not be false, misleading, fraudulent, defamatory, or deceptive.
				</p>
				<p class="content">
					Content that promotes involvement in our site in any fashion and driving simultaneously, or otherwise encourages dangerous behavior (to include but not limited to being intoxicated, drug use, excessive violence, any harm to animals or any exploitation of these subjects), that demeans, degrades, or shows hate toward a particular ethnicity, gender, culture, country, belief, or toward any member of any class (to include but not limited to sensational or disrespectful content), depictions of nudity, sexual behavior, or obscene gestures; deceptive, false, or misleading content, including deceptive claims, offers, or business practices; Any content that directs users to phishing links, malware, or similarly harmful codes or sites that deceives users into providing personal information without their knowledge, under false pretenses, or to companies that resell, trade, or otherwise misuse that personal information, adult products and services, cigarettes (including e-cigarettes), cigars, smokeless tobacco, and other tobacco products, products or services dedicated to selling counterfeit goods or engaging in copyright piracy, get-rich-quick or pyramid schemes or offers or any other deceptive or fraudulent offers, illegal or recreational drugs or drug paraphernalia, firearms, weapons, ammunition, or accessories, ads that promote particular securities or that provide or allege to provide insider tips, and any illegal conduct, product, or enterprise, promotion or reference of alcohol, gambling and games of skill, and lotteries.
				</p>

				<p class="subtitle">
					Testimonials &amp; Endorsements
				</p>
				<p class="content">
					Any testimonials and endorsements contained in ads or in a Careparrot account must comply with all applicable laws, industry codes, rules, and regulations. For example, a clear and conspicuous disclaimer is required if an endorser's results were atypical or if the endorser was paid.
				</p>

				<p class="subtitle">
					Quality &amp; Content
				</p>
				<p class="content">
					All ads must meet the highest editorial quality and standards. All video ads must be full-screen video ads that display in portrait mode or landscape mode.
				</p>

				<p class="subtitle">
					Cookie Policy
				</p>
				<p class="content">
					Our privacy policy explains how we collect and use information from and about you when you use the Careparrot services. We have provided this cookie policy to tell you more about why we use cookies and other similar identifying technologies, the types of cookies and similar technologies we use, and your choices in relation to these technologies.
				</p>

				<p class="subtitle">
					Cookie Overview
				</p>
				<p class="content">
					A cookie is a small piece of data that is sent to your browser or device by websites, mobile apps, and advertisements that you access or use. This data is stored on your browser or device and helps websites and mobile apps remember things about you. For example, cookies may help us remember certain preferences you have selected, such as your language preference.
				</p>

				<p class="subtitle">
					Our Use of Cookies
				</p>
				<p class="content">
					Like most online services, Careparrot uses cookies for a number of reasons, like protecting your data and account, helping us see which features are most popular, counting visitors to a page, improving our users’ experience, keeping our services secure, and just generally providing you with a better, more intuitive, and satisfying experience. The cookies we use generally fall into one of the following categories.
				</p>

				<p class="subtitle">
					Why we use these cookies
				</p>
				<p class="content">
					<strong>Preferences</strong> - We use these cookies to remember your settings and preferences (like languages).<br>
					<strong>Security</strong> - We use these cookies to help identify and prevent security risks.<br>
					<strong>Performance</strong> - We use these cookies to collect information about how you interact with our services and to help us improve them.<br>
					<strong>Analytics</strong> - We use these cookies to help us improve our services.
				</p>

				<p class="subtitle">
					Advertising
				</p>
				<p class="content">
					We use these cookies to deliver advertisements, to make them more relevant and meaningful to consumers, and to track the efficiency of our advertising campaigns, both on our services and on other websites or mobile apps. See Advertising Policy
				</p>

				<p class="subtitle">
					Pixels, Local Storage, and Other Similar Technologies
				</p>
				<p class="content">
					We may also use other similar technologies on our services, such as pixel tags and local storage. We use these technologies to do things like help us see what features are most popular, create a more personalized experience, and deliver relevant ads. Pixel tags (also called clear GIFs, web beacons, or pixels) are small blocks of code installed in or on a webpage, mobile app, or advertisement. These tags can retrieve certain information about your browser and device such as: operating system, browser type, device type and version, referring website, website visited, IP address, and other similar information. Local storage is an industry-standard technology that allows a website or mobile app to store and retrieve data on an individual’s computer, mobile phone, or other device.
				</p>

				<p class="subtitle">
					Your Choices
				</p>
				<p class="content">
					Your browser probably lets you choose whether to accept browser cookies. And you may even be able to choose or limit the use of cookies and other similar technologies in mobile apps. But these technologies are an important part of how our services work, so removing or rejecting cookies, or limiting the use of other similar technologies could affect the availability and functionality of our services.
				</p>

				<p class="subtitle">
					Web browser opt-out
				</p>
				<p class="content">
					Most web browsers are set to accept cookies by default. If you don’t want to allow cookies you may have some options. Your browser may provide you with a set of tools to manage cookies. You can usually set your browser to refuse some cookies or all cookies. For example, some browsers give you the option to allow first-party cookies but block third-party cookies. So what is the difference between first-party and third-party cookies?
				</p>
				<p class="content">
					"Third-party" cookie is served by a company that doesn’t operate the page or domain you are visiting. So for example, when you visit CareParrot.com and Google serves a cookie on CareParrot.com for Careparrot’s analytics that is a third-party cookie.
				</p>
				<p class="content">
					You may also be able to remove cookies from your browser. Your ability to manage cookies through a mobile browser, however, may be limited. For more information about how to manage your cookie settings, please follow the instructions provided by your browser which are usually located within the “Help,” “Tools,” or “Edit” settings.
				</p>

				<p class="subtitle">
					Mobile device opt-outs
				</p>
				<p class="content">
					Your mobile operating system may let you opt-out from having your information collected or used for interest-based advertising on mobile devices. You should refer to the instructions provided by your mobile device’s manufacturer; this information is typically available under the “settings” function of your mobile device.
				</p>

				<p class="subtitle">
					Third-Party Applications and Plugins
				</p>
				<p class="content">
					Third-party applications and plugins that are not supported by Careparrot (found through Careparrot's "CareConnect") and can compromise the security of your account. Please see our Terms of Service for more information.
				</p>
				<p class="content">
					A third-party application is any app that isn't the official Careparrot application, but using your Careparrot login information (username and password) to access Careparrot services. A plugin is an add-on that creates additional functionalities that are not included in the official Careparrot application.
				</p>

				<p class="subtitle">
					Contact Us
				</p>
				<p class="content">
					If you have any questions about our use of cookies, please contact us at help@careparrot.com.
				</p>
				
				<p class="subtitle">
					HIPAA Policy
				</p>
				<p class="content">
					Privacy Policy / Data Privacy Protection
				</p>
				<p class="content">
					Careparrot understands how important your privacy is to you. We are committed to protecting any personal information that you provide us on this website according to applicable laws, regulations and accreditation standards and practices. We are constantly evaluating new safeguards for protecting your information. We urge you to read our Privacy Policy so that you will understand both our commitment to you and your privacy, and how you can participate in that commitment.
				</p>

				<p class="subtitle">
					HIPAA Privacy
				</p>
				<p class="content">
					Authorized employees may access your information to administer our services. All of our authorized employees must sign an agreement to follow our Policies that includes our nondisclosure and confidentiality agreement.
				</p>
				<p class="content">
					We may work with other 3rd parties to help us conduct our business. We are required by law to sign an agreement with these external companies that prohibits them from using or giving out information for any reason other than the purpose of the contract.
				</p>
				<p class="content">
					For example, we may contract with print or mail services for customer communications, auditing or consulting firms for validating the integrity of our process. 
				</p>
				<p class="content">
					We are permitted or required by law to make certain other uses and disclosures of your PHI without your consent or authorization for any purpose required by law or if required to do so by subpoena or discovery request
				</p>
				<p class="content">
					It is our policy to keep all information about you confidential. It is so important to us that we take the following steps: 
				</p>
				<ul>
					<li>
						Our employees sign an agreement to follow our Rules of Engagement to include strict adherence to confidentiality. 
					</li>
					<li>
						We use internal and external auditing (auditors) that reviews our privacy practices. 
					</li>
					<li>
						We have information technology security systems in-place to detect and prevent security breaches. All computer systems have security protection configured and installed. 
					</li>
					<li>
						All data that you enter on our site is encrypted with the industry-standard encryption technology. By encrypting your data, your data is protected while being transferred over the Internet to our servers.
					</li>
					<li>
						Once your data reaches our servers, the same state-of-the art security software that guards our company's essential business data protects your data as well.
					</li>
				</ul>

				<p class="subtitle">
					Non-Personal Data Collected Automatically
				</p>
				<p class="content">
					When you access our web sites, we may automatically collect non-personal data (e.g. type of browser and OS used, domain name of the web site from which you came, number of visits, average time spent on the site, pages viewed). This information is used internally to improve our web sites performance or content.
				</p>

				<p class="subtitle">
					Your Rights
				</p>
				<p class="content">
					The records we maintain about your health are the property of CareParrot. To protect your privacy, we shall check and verify your identity when you have questions or issues about your records.
				</p>

				<p class="subtitle">
					Right to Inspect and Copy
				</p>
				<p class="content">
					You have the right to request a copy of the PHI that we keep on your behalf. All requests to inspect or copy must be made in writing and signed by you with proof of government issued form of identification.
				</p>

				<p class="subtitle">
					Right to Amend
				</p>
				<p class="content">
					You have the right to request in writing that the PHI we maintain about you be amended or corrected. All requests must be in writing be signed by you with proof of government issued form of identification, and must state the reasons for the amendment or correction.
				</p>

				<p class="subtitle">
					Right to Notice of a Breach of Information
				</p>
				<p class="content">
					We are required to notify you by first class mail or e-mail (if you have told us you prefer to receive information by e-mail), of a breach of your PHI data. A breach is any unauthorized acquisition, access, use, or disclosure of information that compromises the security or privacy of your PHI data.
				</p>
				
				<p class="subtitle">
					Changes to This Notice
				</p>
				<p class="content">
					We reserve the right to change the terms of this Notice of Privacy as necessary and to make the new notice effective for all PHI data maintained by us. You may obtain a copy of the current notice from www.careparrot.com, or by mailing a request to the address listed below.
				</p>

				<p class="subtitle">
					Requests and/or Complaint process
				</p>
				<p class="content">
					If you have a question, complaint, request to inspect/amend records, or if you believe your privacy rights have been violated, you may contact the CareParrot Privacy Team via email help@careparrot.com
				</p>

				<p class="subtitle">
					Cookies
				</p>
				<p class="subtitle">How to Opt Out of Cookies</p>
				<p class="content">
					If you do not wish to receive cookies, please configure your browser to erase all cookies from your computer's hard drive, block all cookies or to receive a warning before a cookie is stored. If you opt out of cookies, you will still have access to all information and resources on Careparrot and your Careparrot profile.
				</p>

				<p class="subtitle">
					IP Addresses
				</p>
				<p class="content">
					We collect and log the IP address of all visitors to our websites. An IP address is a number automatically assigned to your computer whenever you access the Internet. IP addresses allow computers and servers to recognize and communicate with one another. We collect IP address information so that we can properly administer our systems and gather aggregate information about how our site is being used, including the pages visitors are viewing. This information is not shared outside of Careparrot. We do not link IP addresses with records containing personal information. We will use IP address information, however, to personally identify you in order to enforce our legal rights or when required to do so by law enforcement authorities.
				</p>	

				<p class="subtitle">
					Your Consent
				</p>
				<p class="content">
					By using our website, you are responsible for providing Careparrot with accurate, relevant, quality, and complete personal information. You also, by using our website, consent to the collection and use of the information discussed above by Careparrot. Changes in this policy will be posted on this page so that you may always be aware of what information is being collected, how it is being used, and under what circumstances it is being disclosed.
				</p>

				<p class="subtitle">
					Third Party Sites
				</p>
				<p class="content">
					Careparrot may contain links to other web sites. We are not responsible for the privacy practices or the content of other web sites.
				</p>
				
				<p class="subtitle">
					Community Guidelines (CareCommunity Pages)
				</p>
				<p class="content">
					Careparrot is a free fun way to share your health experiences through videos and pic sharing with your friends and providers and to the world around you. You can manage your healthcare policies, get free quotes, create local CareCrew's dedicated to staying healthy, get free information on healthcare needs, and monitor your health journey with badges and rewards. Remember sharing is caring!
				</p>
				<p class="content">
					These Terms do indeed form a legally binding contract between you and Careparrot. So please read them carefully. By using the Services, you agree to the Terms. Of course, if you don't agree with them, then don't use the Services.
				</p>
				<p class="content">
					When you use these services (and any others we make available to you) you’ll inevitably share some information with us. We get that that can affect your privacy. So we want to be upfront about the information we collect, how we use it, whom we share it with, and the choices we give you to control, access, and update your information.
				</p>

				<p class="subtitle">
					Community Guidelines (CareCommunity Pages)
				</p>
				<p class="content">
					Careparrot is a free fun way to share your health experiences through videos and pic sharing with your friends and providers and to the world around you. You can manage your healthcare policies, get free quotes, create local CareCrew's dedicated to staying healthy, get free information on healthcare needs, and monitor your health journey with badges and rewards. Remember sharing is caring!
				</p>
				<p class="content">
					These Terms do indeed form a legally binding contract between you and Careparrot. So please read them carefully. By using the Services, you agree to the Terms. Of course, if you don't agree with them, then don't use the Services.
				</p>
				<p class="content">
					When you use these services (and any others we make available to you) you’ll inevitably share some information with us. We get that that can affect your privacy. So we want to be upfront about the information we collect, how we use it, whom we share it with, and the choices we give you to control, access, and update your information.
				</p>

				<p class="subtitle">
					Information We Collect from Third Parties
				</p>
				<p class="content">
					We may collect information that other users provide about you when they use our services. For example, if another user allows us to collect information from their device's contact list (and you’re one of that user’s contacts) we may combine the information we collect from that user’s contact list with other information we have collected about you. We may also obtain information from other companies that are owned or operated by us, or any other third-party sources, and combine that with the information we collect through our services.
				</p>

				<p class="subtitle">
					How We Share Information
				</p>
				<ul>
					<li>We may share information about you in the following ways:</li>
					<li>With other CareParrotters</li>
					<li>We may share the following information with other CareParrotters:</li>
					<li>Information about you, such as your username and name;</li>
					<li>Information about how you have interacted with the services, such as your CareParrot “score,” the names of ‘CareParrotters’ you are friends with, and other information that will help CareParrotters understand your connections with others using the services. For example, because it may not be clear whether a new friend request comes from someone you actually know, we may share whether you and the requestor have friends in common</li>
					<li>
						Any additional information you have consented for us to share. For example, when you let us access your device phonebook, we may share information about you with other users who have your phone number in their device phonebook; and content you post or send will be shared with other CareParrotters; 
					</li>
					<li>
						How widely your content is shared depends on your personal settings and the type of service you are using with all CareParrotters and the general public
					</li>
				</ul>
				<p class="content">
					We may share the following information with all CareParrotters as well as the general public: public information like your Careparrot profile address and profile pictures; and any content that you submit to public venues. If a public venue is streamed on the web or broadcast in some other media, it may be viewed by the public at large.
				</p>
				<ul>
					<li>
						With our affiliates
					</li>
					<li>
						We may share information with entities within the CareParrot family of companies.
					</li>
					<li>
						With third parties
					</li>
					<li>
						We may share your information with the following third parties:
					</li>
					<li>
						With service providers, sellers, and partners
					</li>
					<li>
						We may share information about you with service providers who perform services on our behalf, sellers that provide goods through our services, and business partners that provide services and functionality.
					</li>
					<li>
						With third parties for legal reasons
					</li>
					<li>
						We may share information about you if we reasonably believe that disclosing the information is needed to: comply with any valid legal process, government request, or applicable law, rule, or regulation, investigate, remedy, or enforce potential Terms of Service violations, protect the rights, property, and safety of us, our users, or others, or detect and resolve any fraud or security concerns.
					</li>
				</ul>

				<p class="subtitle">
					Information You Choose to Share with Third Parties
				</p>
				<p class="content">
					The services may also contain third-party links and search results, include third-party integrations, or be a co-branded or third-party-branded service that’s being provided jointly with or by another company. By going to those links, using the third-party integration, or using a co-branded or third-party-branded service, you may be providing information (including personal information) directly to the third party, us, or both. You acknowledge and agree that we are not responsible for how those third parties collect or use your information. As always, we encourage you to review the privacy policies of every third-party website or service that you visit or use, including those third parties you interact with through our services. Any approved third-party partner service will appear in our CareConnect. These third parties are required to adhere to a confidentiality policy between our two parties.
				</p>

				<p class="subtitle">
					How Long We Keep Your Content
				</p>
				<p class="content">
					There are various ways CareParrotters can save content and also upload it to CareParrot (like as an attachment in Chat). We go into more detail below about how users can save CareParrot content. Your content will be stored as long as your remain as a CareParrot member and up to 180 days after deletion. Your content will be deactivated (which means it cannot be seen) within 30 days of deleting an account. Any important policies or records however will be kept permanently until provider or records transfer request with a deletion of records request is put in with CareParrot. Even then, if any applicable law requires us to keep this information on file for extended period of time, we will be under regulation to comply. You should understand that users who see the content you provide can always save it using any number of techniques: screenshots, in-app functionality, or any other image-capture technology. It’s also possible, as with any digital information, that someone might be able to access messages forensically or find them in a device’s temporary storage. Keep in mind that, while our systems are designed to carry out our deletion practices, we cannot promise that deletion will occur within a specific timeframe. And we may also retain certain information in backup for a limited period of time or as required by law.
				</p>

				<p class="subtitle">
					Access and Updates
				</p>
				<p class="content">
					We strive to let you access and update most of the personal information that we have about you. There are limits though to the requests we’ll accommodate. We may reject a request for a number of reasons, including, for example, that the request risks the privacy of other users, requires technical efforts that are disproportionate to the request, is repetitive, or is unlawful. You can access and update most of your basic account information right in the app by visiting the app’s Settings page. If you need to access, update, or delete any other personal information that we may have, see our HIPAA policy. We will try to update and access your information for free, but if it would require a disproportionate effort on our part, we may charge a fee. We will of course disclose the fee before we comply with your request.
				</p>

				<p class="subtitle">
					Revoking Permissions
				</p>
				<p class="content">
					If you change your mind about our ongoing ability to collect information from certain sources that you have already consented to, such as your phonebook, camera, photos, or location services, you can simply revoke your consent by changing the settings on your device if your device offers those options. Of course, if you do that, certain services may lose full functionality.
				</p>

				<p class="subtitle">
					Account Deletion
				</p>
				<p class="content">
					While we hope you’ll remain a lifelong CareParrotter, if for some reason you ever want to delete your account, you will have up to 30 days to restore your account before we delete your information from our servers. During this period of time, your account will be considered inactive and will not be visible to other CareParrotters. We will not however delete any healthcare records or medical records or docs you may have stored on our servers. These records will become deactivated and stored, if in case you decide later that you'd like to access them, or have them transferred to another EMR company or Healthcare Provider.
				</p>

				<p class="subtitle">
					Communicating with other CareParrotters
				</p>
				<p class="content">
					It’s also important to us that you stay in control over whom you communicate with. That’s why we’ve built a number of tools in Settings that let you indicate, among other things, who you want to see your Profile from just your friends or all CareParrotters, and whether you’d like to block another CareParrotter from contacting you again.
				</p>

				<p class="subtitle">
					Users Outside the United States
				</p>
				<p class="content">
					Although we welcome CareParrotters from all over the world, keep in mind that no matter where you live or where you happen to use our services, we operate our services from the United States. This means that we may collect your personal information from, transfer it to, and store and process it in the United States and other countries whose local data-protection and privacy laws may offer fewer protections than those in your country of residence or from any country where you use or access the services.
				</p>

				<p class="subtitle">
					Children
				</p>
				<p class="content">
					Our services are not intended for anyone under 13. And that’s why we do not knowingly collect personal information from anyone under 13.
				</p>

				<p class="subtitle">
					Anti - Abuse Policy
				</p>
				<p class="content">
					Our community is growing every day and we strive to welcome people to an environment free from abusive content. To do this, we rely on people like you. If you see something on Careparrot that you believe violates our terms, please report it. We have dedicated teams working around the world to review things you report to help make sure Careparrot remains safe.
				</p>

				<p class="content">
					Governments also sometimes ask us to remove content that violates local laws, but does not violate our Community Standards. If after careful legal review, we find that the content is illegal under local law, then we may make it unavailable only in the relevant country or territory.
				</p>

				<p class="content">
					Please keep the following in mind:
				</p>

				<p class="content">
					We may take action any time something violates the Community Standards. Reporting something doesn't guarantee that it will be removed because it may not violate our policies.
				</p>

				<p class="content">
					Our content reviewers will look to you for information about why a post may violate our policies. If you report content, please tell us why the content should be removed so that we can send it to the right person for review.
				</p>

				<p class="content">
					Our review decisions may occasionally change after receiving additional context about specific posts or after seeing new, violating content appearing on a Page or Careparrot Profile. The number of reports does not impact 
				</p>

				<p class="content">
					whether something will be removed. We never remove content simply because it has been reported a number of times. The consequences for violating our Community Standards vary depending on the severity of the violation and the person's history on Careparrot. For instance, we may warn someone for a first violation, but if we continue to see further violations we may restrict a person's ability to post on Careparrot or ban the person from Careparrot.
				</p>

				<p class="content">
					Not all disagreeable or disturbing content violates our Community Standards. For this reason, we offer you the ability to customize and control what you see by blocking, and hiding the posts, people, Pages, and applications you don’t want to see – and we encourage you to use these controls to better personalize your experience. People also often resolve issues they have about a piece of content by simply reaching out to the person who posted it. We’ve created tools for you to communicate directly with other people when you’re unhappy with posts, photos, or other content you see on Careparrot.
				</p>

				<p class="subtitle">
					Safety Policies
				</p>

				<p class="content">
					We carefully review reports of threatening language to identify serious threats of harm to public and personal safety. We remove credible threats of physical harm to individuals. We also remove specific threats of theft, vandalism, or other financial harm. We may consider things like a person's physical location or public visibility in determining whether a threat is credible. We may assume credibility of any threats to people living in violent and unstable regions. We don’t allow the promotion of self-injury or suicide. We work with organizations to provide assistance for people in distress. We prohibit content that promotes or encourages suicide or any other type of self-injury, including self-mutilation and eating disorders. We don't consider body modification to be self-injury. We also remove any content that identifies victims or survivors of self-injury or suicide and targets them for attack, either seriously or humorously. Users can, however, share information about self-injury and suicide that does not promote these things. We don’t allow any organizations that are engaged in the following to have a presence on Careparrot: terrorist activity, or organized criminal activity.
				</p>

				<p class="content">
					We also remove content that expresses support for groups that are involved in the violent or criminal behavior mentioned above. Supporting or praising leaders of those same organizations, or condoning their violent activities, is not allowed.
				</p>

				<p class="content">
					We welcome broad discussion and social commentary on these general subjects, but ask that people show sensitivity towards victims of violence and discrimination. We don’t tolerate bullying or harassment. We allow you to speak freely on matters and people of public interest, but remove content that appears to purposefully target private individuals with the intention of degrading or shaming them. This content includes, but is not limited to: Pages that identify and shame private individuals, images altered to degrade private individuals, photos or videos of physical bullying posted to shame the victim, sharing personal information to blackmail or harass people, and repeatedly targeting other people with unwanted friend requests or messages.
				</p>

				<p class="content">
					We define private individuals as people who have neither gained news attention nor the interest of the public, by way of their actions or public profession.
				</p>

				<p class="content">
					We permit open and critical discussion of people who are featured in the news or have a large public audience based on their profession or chosen activities. We remove credible threats to public figures, as well as hate speech directed at them – just as we do for private individuals.
				</p>

				<p class="content">
					We prohibit the use of Careparrot to facilitate or organize criminal activity that causes physical harm to people, businesses or animals, or financial damage to people or businesses. We work with law enforcement when we believe there is a genuine risk of physical harm or direct threats to public safety.
				</p>

				<p class="content">
					We also prohibit you from celebrating any crimes you’ve committed. We do, however, allow people to debate or advocate for the legality of criminal activities, as well as address them in a humorous or satirical way.
				</p>

				<p class="content">
					We remove content that threatens or promotes sexual violence or exploitation. This includes the sexual exploitation of minors, and sexual assault. To protect victims and survivors, we also remove photographs or videos depicting incidents of sexual violence and images shared in revenge or without permissions from the people in the images.
				</p>

				<p class="content">
					Our definition of sexual exploitation includes solicitation of sexual material, any sexual content involving minors, threats to share intimate images, and offers of sexual services. Where appropriate, we refer this content to law enforcement. Offers of sexual services include prostitution, escort services, sexual massages, and filmed sexual activity.
				</p>

				<p class="content">
					We prohibit any attempts by private individuals to purchase, sell, or trade prescription drugs, marijuana, firearms or ammunition. If you post an offer to purchase or sell alcohol, tobacco, or adult products, we expect you to comply with all applicable laws and carefully consider the audience for that content. We do not allow you to use Careparrot's payment tools to sell or purchase regulated goods on our platform.
				</p>

				<p class="content">
					People sometimes share content containing nudity for reasons like awareness campaigns or artistic projects. We restrict the display of nudity because some audiences within our global community may be sensitive to this type of content - particularly because of their cultural background or age. In order to treat people fairly and respond to reports quickly, it is essential that we have policies in place that our global teams can apply uniformly and easily when reviewing content. As a result, our policies can sometimes be more blunt than we would like and restrict content shared for legitimate purposes. We are always working to get better at evaluating this content and enforcing our standards.
				</p>

				<p class="content">
					We remove photographs of people displaying genitals or focusing in on fully exposed buttocks. We also restrict some images of female breasts if they include the nipple, but we always allow photos of women actively engaged in breastfeeding or showing breasts with post-mastectomy scarring. We also allow photographs of paintings, sculptures, and other art that depicts nude figures. Restrictions on the display of both nudity and sexual activity also apply to digitally created content unless the content is posted for educational, humorous, or satirical purposes. Explicit images of sexual intercourse are prohibited. Descriptions of sexual acts that go into vivid detail may also be removed.
				</p>

				<p class="content">
					Careparrot removes hate speech, which includes content that directly attacks people based on their: race, ethnicity, national origin, religious affiliation, sexual orientation, sex, gender, or gender identity, or serious disabilities or diseases. Organizations and people dedicated to promoting hatred against these protected groups are not allowed a presence on Careparrot. As with all of our standards, we rely on our community to report this content to us.
				</p>

				<p class="content">
					People can use Careparrot to challenge ideas, institutions, and practices. Such discussion can promote debate and greater understanding. Sometimes people share content containing someone else's hate speech for the purpose of raising awareness or educating others about that hate speech. When this is the case, we expect people to clearly indicate their purpose, which helps us better understand why they shared that content.
				</p>

				<p class="content">
					We allow humor, satire, or social commentary related to these topics, and we believe that when people use their authentic identity, they are more responsible when they share this kind of commentary. For that reason, we ask that Page owners associate their name and Careparrot Profile with any content that is insensitive, even if that content does not violate our policies. As always, we urge people to be conscious of their audience when sharing this type of content.
				</p>

				<p class="content">
					While we work hard to remove hate speech, we also give you tools to avoid distasteful or offensive content. You can also use CareParrot to speak up and educate the community around you. Counter-speech in the form of accurate information and alternative viewpoints can help create a safer and more respectful environment.
				</p>

				<p class="subtitle">
					Violence and Graphic Content
				</p>

				<p class="content">
					Careparrot is a place where people share their experiences and raise awareness about important issues. Sometimes, those experiences and issues involve violence and graphic images of public interest or concern, such as human rights abuses or acts of terrorism. In many instances, when people share this type of content, they are condemning it or raising awareness about it. We remove graphic images when they are shared for sadistic pleasure or to celebrate or glorify violence.
				</p>

				<p class="content">
					When people share anything on Careparrot, we expect that they will share it responsibly, including carefully choosing who will see that content. We also ask that people warn their audience about what they are about to see if it includes graphic violence.
				</p>

				<p class="subtitle">
					Legal
				</p>
				<p class="subtitle">
					Proprietary Rights
				</p>

				<p class="content">
					All material contained in this Site is protected by law, including but not limited to, United States copyright law. Unless indicated otherwise, Careparrot is the owner of the copyright in the entire content (including images, text and look and feel attributes) of www.careparrot.com and reserves all rights in that regard. Removing or altering the copyright notice on any material on the Site is prohibited. Any commercial use of Site content is prohibited without the prior written consent of Careparrot. Unless indicated otherwise, Careparrot owns all trademarks, service marks or other logos featured on the web site. Use or misuse of these trademarks, service mark or logos is expressly prohibited and may violate federal and state law. Please be advised that Careparrot actively and aggressively enforces its intellectual property rights to the fullest extent of the law.
				</p>

				<p class="subtitle">
					Not Medical or Legal Advice
				</p>

				<p class="content">
					Nothing contained, expressed or implied in the Site is intended as nor shall be construed as medical or legal advice. Inquiries about medical or legal issues, or sensitive or confidential matters should be addressed to appropriate health care or legal professionals.
				</p>

				<p class="subtitle">
					Hold Harmless
				</p>
				<p class="content">
					You agree to indemnify and hold harmless Careparrot, its affiliates and subsidiaries, and all of their respective directors, officers, employees, representatives, proprietors, partners, shareholders, servants, principals, agents, predecessors, successors, assigns, and attorneys from and against any and all claims, proceedings, damages, injuries, liabilities, losses, costs, and expenses (including attorney's fees and litigation expenses) relating to or arising from your use of the web site and any breach by you of these Terms of Service.
				</p>

				<p class="subtitle">
					Copyright and DMCA
				</p>
				<p class="content">
					Careparrot is committed to complying with copyright and related laws, and requires all users of the web site to comply with these laws. You may not store, post, modify, distribute, reproduce in any way, use or disseminate any material or content though the web site in any manner that constitutes an infringement of third party intellectual property rights, including rights granted by copyright law.
				</p>

				<p class="subtitle">
					Reporting Violations
				</p>
				<p class="content">
					Careparrot respects the intellectual property of others, and expects our users to do the same. If you have a good-faith belief that any content on Careparrot violates or infringes your copyright, please complete and submit this form. We'll need you to provide us with enough information to locate the content you're concerned with, as well as an email address in case we need to contact you. Please keep in mind that we may pass along what you report on this form to the user who posted the content you're flagging.
				</p>
				<p class="content">
					I confirm that I have a good-faith belief that the content's use is not authorized by law, principles of fair use, the copyright owner, or the copyright owner's agent and that the information I have provided is accurate. I understand that under Section 512(f) of the Digital Millennium Copyright Act, I may be liable for any damages, including costs and attorneys’ fees, if I knowingly misrepresent or provide false information. I declare under penalty of perjury that I am authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.
				</p>

				<p class="subtitle">
					Arbitration Notice
				</p>
				<p class="content">
					You and CareParrot agree that disputes between us will be resolved by mandatory binding arbitration, and you waive any right to participate in a class action lawsuit or class wide arbitration.
				</p>

				<p class="subtitle">
					Arbitration Rules
				</p>
				<p class="content">
					The Federal Arbitration Act governs the interpretation and enforcement of this dispute-resolution provision. Arbitration will be initiated through the American Arbitration Association ("AAA"). If the AAA is not available to arbitrate, the parties will select an alternative arbitral forum. The rules of the arbitral forum will govern all aspects of this arbitration, except to the extent those rules conflict with these Terms. The AAA Consumer Arbitration Rules governing the arbitration are available online at www.adr.org or by calling the AAA at 1-800-778-7879. The arbitration will be conducted by a single neutral arbitrator. Any claims or disputes where the total amount sought is less than $10,000 USD may be resolved through binding non-appearance-based arbitration, at the option of the party seeking relief. For claims or disputes where the total amount sought is $10,000 USD or more, the right to a hearing will be determined by the arbitral forum's rules. Any judgment on the award rendered by the arbitrator may be entered in any court of competent jurisdiction.
				</p>

				<p class="subtitle">
					Additional Rules for Non-appearance Arbitration
				</p>
				<p class="content">
					If non-appearance arbitration is elected, the arbitration will be conducted by telephone, online, written submissions, or any combination of the three; the specific manner will be chosen by the party initiating the arbitration. The arbitration will not involve any personal appearance by the parties or witnesses unless the parties mutually agree otherwise.
				</p>

				<p class="subtitle">
					Authority of the Arbitrator
				</p>
				<p class="content">
					The arbitrator will decide the jurisdiction of the arbitrator and the rights and liabilities, if any, of you and Careparrot. The dispute will not be consolidated with any other matters or joined with any other cases or parties. The arbitrator will have the authority to grant motions dispositive of all or part of any claim or dispute. The arbitrator will have the authority to award monetary damages and to grant any non-monetary remedy or relief available to an individual under applicable law, the arbitral forum's rules, and the Terms. The arbitrator will issue a written award and statement of decision describing the essential findings and conclusions on which the award is based, including the calculation of any damages awarded. The arbitrator has the same authority to award relief on an individual basis that a judge in a court of law would have. The award of the arbitrator is final and binding upon you and Careparrot.
				</p>

				<p class="subtitle">
					Waiver of Jury Trial
				</p>
				<p class="content">
					YOU AND CAREPARROT WAIVE ANY CONSTITUTIONAL AND STATUTORY RIGHTS TO GO TO COURT AND HAVE A TRIAL IN FRONT OF A JUDGE OR A JURY. You and Careparrot are instead electing to have claims and disputes resolved by arbitration. Arbitration procedures are typically more limited, more efficient, and less costly than rules applicable in court and are subject to very limited review by a court. In any litigation between you and CareParrot over whether to vacate or enforce an arbitration award, YOU AND CAREPARROT WAIVE ALL RIGHTS TO A JURY TRIAL, and elect instead to have the dispute be resolved by a judge.
				</p>

				<p class="subtitle">
					Waiver of Class or Consolidated Actions
				</p>
				<p class="content">
					No part of the procedures will be open to the public or the media. All evidence discovered or submitted at the hearing is confidential and may not be disclosed, except by written agreement of the parties, pursuant to court order, or unless required by law. Notwithstanding the foregoing, no party will be prevented from submitting to a court of law any information needed to enforce this arbitration agreement, to enforce an arbitration award, or to seek injunctive or equitable relief.
				</p>

				<p class="subtitle">
					Right to Waive
				</p>
				<p class="content">
					Any rights and limitations set forth in this arbitration agreement may be waived by the party against whom the claim is asserted. Such waiver will not waive or affect any other portion of this arbitration agreement.
				</p>

				<p class="subtitle">
					Opt-out
				</p>
				<p class="content">
					You may opt out of this arbitration agreement. If you do so, neither you nor Careparrot can force the other to arbitrate. To opt out, you must notify Careparrot in writing no later than 30 days after first becoming subject to this arbitration agreement. Your notice must include your name and address, your Careparrot username and the email address you used to set up your Careparrot account (if you have one), and an unequivocal statement that you want to opt-out of this arbitration agreement. You must send your opt-out notice to this address: Careparrot Subject: ARBITRATION OPT OUT to help@careparrot.com
				</p>

				<p class="subtitle">
					Small Claims Court
				</p>
				<p class="content">
					Notwithstanding the foregoing, either you or Careparrot may bring an individual action in small claims court. Arbitration Agreement Survival - This arbitration agreement will survive the termination of your relationship with CareParrot.
				</p>

				<p class="subtitle">
					Who Can Use the Services
				</p>
				<p class="content">
					No one under 13 is allowed to create an account or use the Services. We may offer additional Services with additional terms that may require you to be even older to use them. So please read all terms carefully.
				</p>
				<p class="content">
					By using the Services, you state that: You can form a binding contract with CareParrot;
				</p>
				<p class="content">
					You are not a person who is barred from receiving any of the services under the laws of the United States or any other applicable jurisdiction; and You will comply with these Terms and all applicable local, state, national, and international laws, rules, and regulations.
				</p>
				<p class="content">
					If you are using the Services on behalf of a business or some other entity, you state that you are authorized to grant all licenses set forth in these Terms and to agree to these Terms on behalf of the business or entity. If you are using the services on behalf of an entity of the U.S. Government, you agree you are authorized to do so and agree to the Terms on behalf of the U.S. Government.
				</p>

				<p class="subtitle">
					Rights We Grant You
				</p>
				<p class="content">
					Careparrot grants you a personal, worldwide, royalty-free, non-assignable, nonexclusive, revocable, and non-sublicensable license to access and use our services. This license is for the sole purpose of letting you use and enjoy the Service's benefits in a way that these Terms and our usage policies, such as our Community Guidelines allow. Any software that we provide you may automatically download and install upgrades, updates, or other new features. You may be able to adjust these automatic downloads through your device's settings. You may not copy, modify, distribute, sell, or lease any part of our services, nor may you reverse engineer or attempt to extract the source code of that software, unless applicable laws prohibit these restrictions or you have our written permission to do so.
				</p>

				<p class="subtitle">
					Rights You Grant Us
				</p>
				<p class="content">
					Many of our Services let you create, upload, post, send, receive, and store content. When you do that, you retain whatever ownership rights in that content you had to begin with. But you grant us a license to use that content. How broad that license is depends on which services you use and the Settings you have selected.
				</p>
				<p class="content">
					For all services other you grant Careparrot a worldwide, royalty-free, sub-licensable, and transferable license to host, store, use, display, reproduce, modify, adapt, edit, publish, and distribute that content. This license is for the limited purpose of operating, developing, providing, promoting, and improving the services and researching and developing new ones, also granting us a perpetual license to create derivative works from, promote, exhibit, broadcast, syndicate, publicly perform, and publicly display content submitted, or any other in any and all media or distribution methods (now known or later developed). To the extent it's necessary, you also grant Careparrot and our business partners the unrestricted, worldwide, perpetual right and license to use your name, likeness, and voice solely content that you appear in, create, upload, post, or send. This means, among other things, that you will not be entitled to any compensation from Careparrot or our business partners if your name, likeness, or voice is conveyed through our services.
				</p>
				<p class="content">
					While we're not required to do so, we may access, review, screen, and delete your content at any time and for any reason, including if we think your content violates these Terms. You alone though remain responsible for the content you create, upload, post, send, or store through our service. The services may contain advertisements. In consideration for Careparrot letting you access and use our services, you agree that CareParrot, its affiliates, and third-party partners may place advertising on our services. We always love to hear from our users. But if you volunteer feedback or suggestions, just know that we can use your ideas without compensating you.
				</p>
				<p class="content">
					The Content of Others
				</p>
				<p class="content">
					Much of the content on our Services is produced by users, professionals, and other third parties. Whether that content is posted publicly or sent privately, the content is the sole responsibility of the person or organization that submitted it. Although Careparrot reserves the right to review all content that appears on our services and to remove any content that violates these Terms, we do not necessarily review all of it. So we do not take responsibility for any content that others provide through the Services.
				</p>

				<p class="subtitle">
					Respecting Other Rights
				</p>
				<p class="content">
					Careparrot respects the rights of others. And so should you. You therefore may not upload, post, send, or store content that: violates or infringes someone else's rights of publicity, privacy, copyright, trademark, or other intellectual-property right, bullies, harasses, or intimidates, defames, or spams or solicits Careparrot's users. You must also respect Careparrot's rights. These Terms do not grant you any right to: use branding, logos, designs, photographs, videos, or any other materials used in our Services, copy, archive, download, upload, distribute, syndicate, broadcast, perform, display, make available, or otherwise use any portion of the services or the content on the services except as set forth in these Terms, use the services or any content on the services for any commercial purposes without our consent
				</p>

				<p class="subtitle">
					Your Account
				</p>
				<p class="content">
					You are responsible for any activity that occurs in your account. So it's important that you keep your account secure. One way to do that is to select a strong password that you don't use for any other account. You agree that, in addition to exercising common sense: You will not create more than one account for yourself. You will not create another account if we have already disabled your account, unless you have our written permission to do so. You will not buy, sell, rent, or lease access to your CareParrot account. You will not share your password.You will not log in or attempt to access the services through unauthorized third-party applications or clients. If you think that someone has gained access to your account, please immediately reach out to us at help@careparrot.com
				</p>

				<p class="subtitle">
					Purchases and Payments
				</p>
				<p class="content">
					We may offer various virtual goods and services that you can purchase and use through the web site. You don't own these virtual goods; instead you buy a limited revocable license to use them. You'll always be shown the price for virtual goods before you complete a purchase. But Careparrot does not handle payments or payment processing for any purchases; those are handled by third-party payment providers or service providers (such as, Apple's App Store and Google's Play Store, among others). Some third-party service providers may charge you sales tax, depending on where you live. Please check the third-party service provider's relevant terms for details. Subject to any applicable additional terms and conditions, all purchases are final and non-refundable. And because our performance begins once you tap buy and we give you immediate access to your purchase, you waive any right you may have under any applicable local law to cancel your purchase once it's completed or to get a refund. BY ACCEPTING THESE TERMS, YOU AGREE THAT CAREPARROT IS NOT REQUIRED TO PROVIDE A REFUND FOR ANY REASON. Some of the virtual goods we offer are for one-time use only, while others are for repeated use. But please note that "repeated" does not mean "forever." We may change, modify, or eliminate virtual goods at any time, with or without notice. You agree that we will bear no liability to you or any third party if we do so. If we suspend or terminate your account, you will lose any virtual goods you purchased through the web site. It's your sole responsibility to manage your purchases. If you are under 18, you must obtain your parent's or guardian's consent before making any purchases.
				</p>

				<p class="subtitle">
					Data Charges and Mobile Phones
				</p>
				<p class="content">
					You are responsible for any mobile charges that you may incur for using our web site and services, including text-messaging and data charges. If you're unsure what those charges may be, you should ask your service provider before using the web site. If you change or deactivate the mobile phone number that you used to create a CareParrot account, you must update your account information through Settings within 72 hours to prevent us from sending to someone else messages intended for you.
				</p>

				<p class="subtitle">
					Modifying the Web site and Termination
				</p>
				<p class="content">
					We're improving our web site and creating new services all the time. That means we may add or remove features, products, or functionalities, and we may also suspend or stop the web site altogether. We may take any of these actions at any time, and when we do, we may not provide you with any notice beforehand. While we hope you remain a lifelong CareParrotter, you can terminate these Terms at any time and for any reason by deleting your account. CareParrot may also terminate these Terms with you at any time, for any reason, and without advanced notice. That means that we may stop providing you with any services, or impose new or additional limits on your ability to use the Web site. For example, we may deactivate your account due to prolonged inactivity, and we may reclaim your username at any time for any reason.
				</p>

				<p class="subtitle">
					Disclaimers
				</p>
				<p class="content">
					We try to keep the Web site up and running and free of annoyances. But we make no promises that we will succeed. THE SERVICES ARE PROVIDED "AS IS" AND "AS AVAILABLE" AND TO THE EXTENT PERMITTED BY APPLICABLE LAW WITHOUT WARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, AND NON-INFRINGEMENT. IN ADDITION, WHILE CAREPARROT ATTEMPTS TO PROVIDE A GOOD USER EXPERIENCE, WE DO NOT REPRESENT OR WARRANT THAT: (A) THE SERVICES WILL ALWAYS BE SECURE, ERROR-FREE, OR TIMELY; (B) THE SERVICES WILL ALWAYS FUNCTION WITHOUT DELAYS, DISRUPTIONS, OR IMPERFECTIONS; OR (C) THAT ANY CAREPARROT CONTENT, USER CONTENT, OR INFORMATION YOU OBTAIN ON OR THROUGH THE SERVICES WILL BE TIMELY OR ACCURATE. CAREPARROT TAKES NO RESPONSIBILITY AND ASSUMES NO LIABILITY FOR ANY CONTENT THAT YOU, ANOTHER USER, OR A THIRD PARTY CREATES, UPLOADS, POSTS, SENDS, RECEIVES, OR STORES ON OR THROUGH OUR SERVICES. YOU UNDERSTAND AND AGREE THAT YOU MAY BE EXPOSED TO CONTENT THAT MIGHT BE OFFENSIVE, ILLEGAL, MISLEADING, OR OTHERWISE INAPPROPRIATE, NONE OF WHICH CAREPARROT WILL BE RESPONSIBLE FOR.
				</p>

				<p class="subtitle">
					Limitation of Liability
				</p>
				<p class="content">
					TO THE MAXIMUM EXTENT PERMITTED BY LAW, CAREPARROT AND OUR MANAGING MEMBERS, SHAREHOLDERS, EMPLOYEES, AFFILIATES, LICENSORS, AND SUPPLIERS WILL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE, OR MULTIPLE DAMAGES, OR ANY LOSS OF PROFITS OR REVENUES, WHETHER INCURRED DIRECTLY OR INDIRECTLY, OR ANY LOSS OF DATA, USE, GOODWILL, OR OTHER INTANGIBLE LOSSES, RESULTING FROM: (A) YOUR ACCESS TO OR USE OF OR INABILITY TO ACCESS OR USE THE SERVICES; (B) THE CONDUCT OR CONTENT OF OTHER USERS OR THIRD PARTIES ON OR THROUGH THE SERVICES; OR (C) UNAUTHORIZED ACCESS, USE, OR ALTERATION OF YOUR CONTENT, EVEN IF CAREPARROT HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO EVENT WILL CAREPARROT'S AGGREGATE LIABILITY FOR ALL CLAIMS RELATING TO THE SERVICES EXCEED THE GREATER OF $100 USD OR THE AMOUNT YOU PAID CAREPARROT, IF ANY, IN THE LAST 12 MONTHS. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES, SO SOME OR ALL OF THE EXCLUSIONS AND LIMITATIONS IN THIS SECTION MAY NOT APPLY TO YOU.
				</p>

				<p class="subtitle">
					Exclusive Venue
				</p>
				<p class="content">
					To the extent the parties are permitted under these Terms to initiate litigation in a court, both you and CareParrot agree that all claims and disputes arising out of or relating to the Terms or the use of the Services will be litigated exclusively in the United States District Court for South Carolina. You and CareParrot consent to the personal jurisdiction of both courts.
				</p>

				<p class="subtitle">
					Severability
				</p>
				<p class="content">
					If any provision of these Terms is found unenforceable, then that provision will be severed from these Terms and not affect the validity and enforceability of any remaining provisions.
				</p>

				<p class="subtitle">
					Final Terms
				</p>
				<p class="content">
					These Terms make up the entire agreement between you and Careparrot, and supersede any prior agreements. These Terms do no create or confer any third-party beneficiary rights. If we do not enforce a provision in these Terms, it will not be considered a waiver. We reserve all rights not expressly granted to you. You may not transfer any of your rights or obligations under these Terms without our consent. These Terms were written in English and to the extent the translated version of these Terms conflict with the English version, the English version will control.
				</p>

				<p class="subtitle">
					Contact Us
				</p>
				<p class="content">
					CareParrot welcomes comments, questions, concerns, or suggestions. Please send feedback to us by visiting www.careparrot.com/contact
				</p>

				<p class="subtitle">
					Enrollment Platform Acceptable Use Policy (main TOS and CRM TOS)
				</p>
				<p class="content">
					Agent & Agency affirms that by using the platform:
				</p>
				<ul>
					<li>By using the tools and services for agents provide by CareParrot.com, agents agree to the following Acceptable Use Policy which may be updated from time to time.</li>
					<li>
						Only the agent of record may submit enrollments under their name.
					</li>
					<li>
						It is the Agents sole responsibility to verify that all information submitted during the setup for their use of the Careparrot.com platform is accurate and that all required licenses and appointments are valid. 
					</li>
					<li>
						A notification of any updates must be directed to Careparrot in a timely fashion. 
					</li>
					<li>
						They hold active licenses in all states in which they enroll customers in health insurance plans using our platform, and will provide to Careparrot if requested, documentation verifying licenses and status. 
					</li>
					<li>
						All information provided to Careparrot regarding insurance carrier appointments is true and accurate.
					</li>
					<li>
						Agent agrees that any errors in designation of insurance carrier appointments are solely the agents/agencies responsibility and in case of any errors any loss of commissions by agent/agency shall not be held against Careparrot.com.
					</li>
				</ul>
				<p class="content">
					It is required by CMS regulations that Careparrot, as a web broker entity (WBE), must in consumer facing websites display all plans available to a consumer. This means that for agents direct to consumer website, plans may be displayed which the agent is not appointed with. Plans displayed within the agent enrollment website (agent facing) will be limited to those that the agent indicates they are appointed with. Agent will obtain consent for all consumers enrolled and will communicate to the consumer the date the application will be submitted along with the effective date of the coverage. Should a prospect go to the agents Client Facing Site, (i.e. URL assigned to agent or agency), and prospect resides in a state in which agent is not licensed or prospect selects an insurance plan through a carrier with which the agent is not appointed, prospect may be assigned to a local licensed partner of Careparrot at its sole discretion. Agent must be involved in enrollment process and review application for enrollment.
				</p>
				<p class="content">
					You have completed all required testing and certifications required by CMS (Center for Medicare/Medicaid Services) and that the FFM number provided is true and accurate. Agent agrees that any errors in the submission of their FFM number is solely the agents/agencies responsibility and in case of any errors any loss of commissions by agent/agency shall not be held against CareParrot.com. They have completed any testing or certifications which insurance carriers might require, including those specific, if applicable, to selling on exchange plans.
				</p>
				<p class="content">
					Agent acknowledges that the Errors and Omissions (E&O) insurance policy of CareParrot.com is not liable for any claims against agent while using the Careparrot enrollment platform. It is agents’ responsibility and our recommendation for the agent to secure their own E&O coverage. They will keep all enrolled or prospective consumer information which might be gathered in compliance with CMS and HIPAA guidelines. We are required by Federal law (45 CFR 155.220), to report regulator violations to CMS. Penalties can result in possible forfeiture of insurance licenses and other damages.
				</p>

				<div class="text-center">
					<div class="div-agreement">
						<a href="/auth/register" class="btn-agree">
							I Agree to the Terms and Conditions
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {

		$('#select_lang').on('click', function() {
			$('#languagesModal').modal('toggle');
		});

    	$('.sidebar-btn').click(function(){
			$(this).toggleClass('open');
		});

    	$('.sidebar-btn').on('click', function() {
			if ($('#sidebar').is(':hidden')) {
				$('#sidebar').fadeIn('fast');
			}
			else if ($('#sidebar').is(':visible')) {
				$('#sidebar').hide();
				$('#sidebar').fadeOut('fast');
			}
		});
	});
</script>
<script type="text/javascript">
$(".slide-btn").click(function() {
  	$("html, body").animate({ scrollTop: $(document).height() }, "slow");
  	return false;
});
</script>
@endsection