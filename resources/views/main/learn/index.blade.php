@extends('main.learn.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link rel="stylesheet" href="/assets/css/learn.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,700,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="/assets/css/health.css">
@endsection

@section('content.inner')
@include('main.partials.sidebar')
<div class="learn-container">
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="back">
      <a href="/">
        <img src="/assets/icons/logo.png" alt="" class="img-responsive">
        back
      </a>
    </li>
    <li class="active">
      <a href="#why" aria-controls="why" role="tab"  data-toggle="tab">WHY</a>
    </li>
    <li>
      <a href="#about" aria-controls="about" role="tab" data-toggle="tab">ABOUT</a>
    </li>
    <li>
      <a href="#culture" aria-controls="culture" role="tab"  data-toggle="tab">CULTURE</a>
    </li>
    <li>
      <a href="#contributions" aria-controls="contributions" role="tab"  data-toggle="tab">CHARITABLE CONTRIBUTIONS</a>
    </li>
    <li>
      <a href="#sustainability" aria-controls="sustainability" role="tab"  data-toggle="tab">SUSTAINABILITY</a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane fade active in" role="tabpanel" id="why">
      <div class="tab-header text-center">
        <img src="/assets/icons/learn/why.png" alt="" class="img-responsive">
      </div>
      <div class="tab-body col-md-12">
        <div class="text-center">
          <p>We were tired of health insurance agents.</p>
          <p>We were tired of having to schedule appointments just to get information about health insurance at</p>
          <p>someone's office, when we really just wanted to stay in bed.</p>
          <p>We were tired of insurance being painful, cringe worthy, and truly inconsistent in service.</p>
          <p>We were tired of health being, let's be honest, BORING!</p>
          <p>We were tired of health planning being very reactive vs. proactive</p>
          <p>We were tired of healthcare being slow.</p><br>
        </div>
        <p class="text-justified">
          Mostly, we were tired of client users (who are always right by the way), not having an open forum to give the important feedback, to offer each other support in a positive environment, and telling the Company exactly what a user wants.
        </p>
        <div class="text-center">
          <p>
            So we built it and we <span class="text-shared">Shared</span> it.
          </p>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="about">
      <div class="tab-header text-center">
        <img src="/assets/icons/learn/about.png" alt="" class="img-responsive">
      </div>
      <div class="tab-body col-md-12">
        <p>CareParrot's vision is to make healthcare now a community effort and easily accessible to  the masses. It's too difficult these days to do it all alone.</p><br>
        <p>CareParrot is designed to evolve as our Company and Members evolve and grow together. We continue to get to know you, we'll make recommendations predict what your next step should be in your journey.</p><br>
        <p>We don't talk about our competition because we have none. We are unique and the first of our kind. We are not just a health insurance quote engine, we are a CareCommunity. Our quote engine is absolutely free, as will be most of our services. Free to sign up, Free to learn. Care for a friend and invite them.</p><br>
        <p>Money's great, but what's really important is being STRESS FREE so you can be around to enjoy it.</p><br>
        <p>Stay informed, be involved, plan smarter, live better.</p>
      </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="culture">
      <div class="tab-header text-center">
        <img src="/assets/icons/learn/culture.png" alt="" class="img-responsive">
      </div>
      <div class="tab-body col-md-12">
        <p class="text-justified">
          We take pride in the diversity of those that are a part of our Company to those in our  CareCommunity. The CareParrot logo is a mascot that stands for a single voice of all the different backgrounds of our beautiful membership. We all have great ideas on how to improve Healthcare, so begin sharing today.
        </p>
        <div class="text-center">
          <p>We believe in saying what you mean and meaning what you say; very open book like. </p><br>
          <p>We believe in cultural diversity.</p><br>
          <p>Hey, everyone has a quirkiness to them.</p><br>
          <p>Feedback is undervalued by most and highly desired by us.</p><br>
          <p>Protect privacy at all costs.</p><br>
          <p>Keep it Simple.</p><br>
          <p>Equality.</p><br>
          <p>Always strive for improvement.</p><br>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="contributions">
      <div class="tab-header text-center">
        <img src="/assets/icons/learn/charitable.png" alt="" class="img-responsive">
      </div>
      <div class="tab-body col-md-12 text-left">
        <div class="pad-right">
          <p>CareParrot believes in not just giving money, but being actively involved as good citizens as a civic duty and our social responsibility. A portion of all profits CareParrot makes are contributed toward protecting the Macaw Parrot species against deforestation. </p><br>
          <p>CareParrot also reinvests a good portion of its profits into infrastructure and research for better and more accessible health services.</p>
        </div>
        <div class="tab-body-footer">
          <img src="/assets/icons/learn/charitable-img.png" class="img-responsive pull-right" alt="">
        </div>
      </div>
    </div>
    <div class="tab-pane fade" role="tabpanel" id="sustainability">
      <div class="tab-header text-center">
        <img src="/assets/icons/learn/sustainability.png" alt="" class="img-responsive">
      </div>
      <div class="tab-body col-md-12 text-center">
        <h3 class="h3-title">CareParrot believes in reducing our foot print:</h3><br>
        <p>1. By reducing paperwork,</p>
        <p>2. Promoting digital services instead,</p>
        <p>3. Promoting of recycling services,</p>
        <p>4. Collaborating and integrating with partners for better products and services,</p>
        <p>5. Being great at what we do,</p>
        <p>6. Listening and being transparent,</p>
        <p>7. Committing ourselves to sustainability and being a benefit to the environment,</p>
        <p>8. Integrating sustainability as a normal part of our practices and philosophy,</p>
        <p>9. Pushing for beneficial tech and services,</p>
        <p>10. Disrupting
         everything.</p>
      </div>
    </div>
  </div>
</div>
@include('main.partials.templates.health-modals')
@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
  sidebar.init();
</script>
<script type="text/javascript" src="/assets/js/health.js"></script>
<script type="text/javascript">
  health.init();
</script>
@endsection
