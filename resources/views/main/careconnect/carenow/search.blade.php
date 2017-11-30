@extends('main.careconnect.carenow.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/carenow/search.css">

<link rel="stylesheet" href="/assets/css/rx/doctor.css">
<link rel="stylesheet" href="/assets/css/rx/doctor-single.css">

<link rel="stylesheet" href="/assets/css/rx/clinic.css">
<link rel="stylesheet" href="/assets/css/rx/clinic-single.css">

<link rel="stylesheet" href="/assets/css/rx/medication.css">
<link rel="stylesheet" href="/assets/css/rx/medication-single.css">

<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('content.inner')
	@include('main.partials.sidebar')

	<div class="row">
		<div class="search-container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left">
							<a href="/carenow" class="home-back">
								<i class="fa fa-home fa-lg" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>

				<div class="row row-search">
					<div class="col-md-12">
						<ul class="tab-view">
							<li>
								<a href="javascript:void(0);" name="tab-link" class="search-tab active"><i class="fa fa-search" aria-hidden="true"></i> Search</a>
							</li>
							<li>
								<a href="javascript:void(0);" name="tab-link" class="list-tab">List View</a>
							</li>
						</ul>

						<input type="text" class="search-input form-control" value="Difficulty Breathing">

						<div class="search-view-container">
							<div class="search-view-box">

								<div class="inner">
									<p class="search-title">Possible Conditions</p>
									<ul class="condition">
										<li><a href="" data-toggle="modal" data-target="#conditions">Gout</a></li>
										<li><a href="" data-toggle="modal" data-target="#conditions">High Blood Pressure</a></li>
										<li><a href="" data-toggle="modal" data-target="#conditions">High Cholesterol</a></li>
									</ul>

									<p class="search-title">Common Causes</p>
									<ul class="causes">
										<li><a href="" data-toggle="modal" data-target="#causes">Sample 1</a></li>
										<li><a href="" data-toggle="modal" data-target="#causes">Sample 2</a></li>
										<li><a href="" data-toggle="modal" data-target="#causes">Sample 3</a></li>
									</ul>

									<p class="search-title">Suggested Treatment</p>
									<ul class="treatment">
										<li><a href="" data-toggle="modal" data-target="#medications">Rest</a></li>
										<li><a href="" data-toggle="modal" data-target="#medications">Nonsteroidal Anti-inflammatory medications/NSAIDs</a></li>
									</ul>

									<p class="search-title">Suggested Test</p>
									<p class="search-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore suscipit, expedita rem dicta nobis voluptatem velit earum non possimus voluptatum quod deserunt laborum qui obcaecati sed voluptas facilis quibusdam nulla corporis dignissimos. Minima, nam, inventore. Quaerat, placeat, at recusandae enim autem officia deserunt, numquam, odio quia nam atque sint sapiente.
									</p>

									<p class="search-title">Suggested Facility</p>
									<ul class="facility">
										<li><a href="" data-toggle="modal" data-target="#facility">South Strand</a></li>
										<li><a href="" data-toggle="modal" data-target="#facility">Sample 2</a></li>
										<li><a href="" data-toggle="modal" data-target="#facility">Sample 3</a></li>
									</ul>

									<p class="search-title">Suggested Doctor/s</p>
									<ul class="doctor">
										<li><a href="" data-toggle="modal" data-target="#doctor">Dr. Jane Doe, M.D</a></li>
										<li><a href="" data-toggle="modal" data-target="#doctor">Sample 2</a></li>
										<li><a href="" data-toggle="modal" data-target="#doctor">Sample 3</a></li>
									</ul>
								</div>
							</div>

						</div>

						<div class="list-view-container">
							<ul class="az-list">
								<li><a name="link" href="#a">A</a></li>
								<li><a name="link" href="#b">B</a></li>
								<li><a name="link" href="#c">C</a></li>
								<li><a name="link" href="">D</a></li>
								<li><a href="">E</a></li>
								<li><a href="">F</a></li>
								<li><a href="">G</a></li>
								<li><a href="">H</a></li>
								<li><a href="">I</a></li>
								<li><a href="">J</a></li>
								<li><a href="">K</a></li>
								<li><a href="">L</a></li>
								<li><a href="">M</a></li>
								<li><a href="">N</a></li>
								<li><a href="">O</a></li>
								<li><a href="">P</a></li>
								<li><a href="">Q</a></li>
								<li><a href="">R</a></li>
								<li><a href="">S</a></li>
								<li><a href="">T</a></li>
								<li><a href="">U</a></li>
								<li><a href="">V</a></li>
								<li><a href="">W</a></li>
								<li><a href="">X</a></li>
								<li><a href="">Y</a></li>
								<li><a href="">Z</a></li>
							</ul>

							<div class="list-view-box">

								<div class="inner">
									<div class="a" id="a">
										<ul class="symptom-list">
											<li><a href="">A, Hemophilia (Hemophilia)</a></li>
											<li><a href="">A, Hepatitis (Hepatitis A)</a></li>
											<li><a href="">AAA (Abdominal Aortic Aneurysm)</a></li>
											<li><a href="">AAT (Alpha 1 Antitrypsin Deficiency)</a></li>
											<li><a href="">AATD (Alpha 1 Antitrypsin Deficiency)</a></li>
											<li><a href="">Abdominal Adhesions (Scar Tissue)</a></li>
											<li><a href="">Abdominal Aortic Aneurysm</a></li>
											<li><a href="">Abdominal Cramps (Heat Cramps)</a></li>
											<li><a href="">Abdominal Hernia (Hernia Overview)</a></li>
											<li><a href="">Abdominal Migraines in Children and Adults</a></li>
										</ul>
									</div>
									<div class="b" id="b">
										<ul class="symptom-list">
											<li><a href="">B, Hemophilia (Hemophilia)</a></li>
											<li><a href="">Baby Blues (Postpartum Depression)</a></li>
											<li><a href="">Baby Bottle Tooth Decay (Oral Health Problems in Children)</a></li>
											<li><a href="">Baby Movement Week-by-Week (Fetal Movement: Feeling Baby Kick Week-by-Week)</a></li>
											<li><a href="">Baby with Health Problems: Breastfeeding (Breastfeeding: Common Breastfeeding Challenges)</a></li>
											<li><a href="">Back Pain (Low Back Pain)</a></li>
											<li><a href="">Back Pain Management (Pain Management)</a></li>
											<li><a href="">Back Surgery (Minimally Invasive Lumbar Spinal Fusion)</a></li>
											<li><a href="">Baclofen Pump Therapy</a></li>
											<li><a href="">Bacterial Arthritis (Septic Arthritis)</a></li>
										</ul>
									</div>
									<div class="c" id="c">
										<ul class="symptom-list">
											<li><a href="">C Diff (Clostridium Difficile Colitis)</a></li>
											<li><a href="">C-Reactive Protein Test (CRP)</a></li>
											<li><a href="">C-Section (Cesarean Birth)</a></li>
											<li><a href="">C. Difficile Colitis (Clostridium Difficile Colitis)</a></li>
											<li><a href="">CA 125</a></li>
											<li><a href="">CABG (Coronary Artery Bypass Graft)</a></li>
											<li><a href="">CAD (Heart Disease (Coronary Artery Disease))</a></li>
											<li><a href="">Calcific Bursitis</a></li>
											<li><a href="">Calcium Pyrophosphate Deposition Disease (Pseudogout)</a></li>
											<li><a href="">Calcium Supplements (Vitamins and Calcium Supplements)</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('main.careconnect.carenow.modal.doctor-modal')
@include('main.careconnect.carenow.modal.doctor-single')

@include('main.careconnect.carenow.modal.facility-modal')
@include('main.careconnect.carenow.modal.facility-single')

@include('main.careconnect.carenow.modal.medications-modal')
@include('main.careconnect.carenow.modal.medications-single')

@include('main.careconnect.carenow.modal.causes-modal')

@include('main.careconnect.carenow.modal.conditions-modal')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script src="/assets/js/jquery-scrollto.js"></script>
<script src="/assets/js/listview.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
