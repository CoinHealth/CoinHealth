@extends('main.marketplace.base')

@section('styles')
<link rel="stylesheet" href="/assets/css/sidebar.css">
<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/assets/css/gameon.css">
@endsection

@section('content.inner')
  <div class="main-header">
    <div class='main-cp-icon col-xs-12'>
      <a href="/">
        <img src="/assets/icons/careparrot-icon-trans.png" class='img-responsive'>
      </a>
    </div>
  </div>
	@include('main.partials.sidebar')
  <div class="badge-container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="float-left">
            <a href="" class="cp-logo">
              <img src="/assets/icons/cp-logo-a.png" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="row badge-list">
        <div class="col-md-4">
          <div class="box-badge">
            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_socialite.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Socialite Badge</h4>
                <p>Like, share, comment and post on your wall</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_takin_over.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Task Badge</h4>
                <p>Get specific tasks done</p>
                </div>
            </div>

            <div class="clear"></div>


            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_network_provider.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Network Provider Badge</h4>
                <p>Collaborate with fellow members</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_night_crusader.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Night Crusader Badge</h4>
                <p>Log-in during night time</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_contact.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Contact Badge</h4>
                <p>Managing your contacts</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_smooth_talker.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Conversation Badge</h4>
                <p>Messaging other members</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/lead.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Lead Badge</h4>
                <p>Adding leads contact details</p>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-badge">
            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_file_wizard.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Upload Documents Badge</h4>
                <p>Upload files and documents</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/account.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Account Badge</h4>
                <p>Taking over an application</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_early_bird.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Early Bird Badge</h4>
                <p>Early morning log-in</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_eyes_on_you.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Follow Badge</h4>
                <p>Followed 10 members</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_give_ratings.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Ratings and Feedback Badge</h4>
                <p>Rate the performance of health professionals and agents</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_daily_routine.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Login Badge</h4>
                <p>First ever log-in</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_topic_creator.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Topic Creator Badge</h4>
                <p>Start a thread on the Forum</p>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box-badge">
            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_superstar.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Update Profile Badge</h4>
                <p>Keep your profile up to date</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_happy_anniversary.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">1 Year Lead Badge</h4>
                <p>Be a CareParrot member for a year</p>
                </div>
            </div>

            <div class="clear"></div>


            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/badge_second_anniversary.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">2 Years Badge</h4>
                <p>Be a CareParrot member for 2 years</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/100 lead.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">100 Leads Badge</h4>
                <p>Upload 100 leads contact details</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/300 lead.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">300 Leads Badge</h4>
                <p>Upload 300 leads contact details</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/500 lead.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">500 Leads Badge</h4>
                <p>Upload 500 leads contact details</p>
                </div>
            </div>

            <div class="clear"></div>

            <div class="media">
                <div class="media-left">
                  <a href="#">
                      <img class="media-object" src="/assets/icons/badges/mass account.png" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">Mass Account Badge</h4>
                <p>process multiple active accounts on queue</p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="p-badge">Earn BADGES by sharing, Getting involved, Completing tasks and more!</p>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="/assets/js/sidebar.js"></script>
<script type="text/javascript">
	sidebar.init();
</script>
@endsection
