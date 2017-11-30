@extends('main.community.base')

@section('styles')
    <link rel="stylesheet" href="/assets/css/sidebar.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/assets/css/careprofile.css">
    <link rel="stylesheet" href="/assets/css/dropzone.min.css">
@endsection

@section('content.inner')
    <div class="post-template" style="display:none">
        @include('main.community.templates.post')
    </div>
    <div class="timeline-reply-template" style="display:none">
        @include('main.community.templates.reply')
    </div>
    <div class="timeline-image-template" style="display:none">
        @include('main.community.templates.attachments')
    </div>
    @include('main.partials.sidebar')
    <div class="violet-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <a href="/" class="a-home">
                            <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>  
            </div>
            <div class="row">
                <div class="col-md-7">
                    @if (auth()->check())
                        <div id="post-tab">
                            <ul  class="nav nav-pills">
                                <li class="active">
                                    <a href="#post" data-toggle="tab"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#image"  data-toggle="tab"><i class="fa fa-camera fa-lg" aria-hidden="true"></i></a>
                                </li>
                                <li>
                                    <a href="#" data-toggle="tooltip" title="Coming Soon"><i class="fa fa-question-circle fa-lg" aria-hidden="true"></i></a>
                                </li>
                                <li >
                                    <a href="#" data-toggle="tooltip" title="Coming Soon"><i class="fa fa-user fa-lg" aria-hidden="true"></i></a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="post">
                                    <div class="media text-media new-post-container">
                                        <div class="media-left">
                                            <img class="media-object prof-img" src="{{ auth()->user()->avatar_path }}">
                                        </div>
                                        <div class="media-body">
                                            <form action="/timeline" method="post">
                                                <textarea name="description" class="form-control" rows="2" id="prof-text" placeholder="Write something..."></textarea>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="image">
                                    <div class="media text-media">
                                        <div class="media-left">
                                            <img class="media-object prof-img" src="{{ auth()->user()->avatar_path }}">
                                        </div>
                                        <div class="media-body">
                                            <div id="dz-attachments" class="dropzone dz-attachments">
                                                <div class="dz-message" data-dz-message><span>Drop files here or click here to upload.</span></div>
                                                <div class="dz-attachments-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="send-div">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <a href="#" class="btn-yellow btn-post">Post</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="post-container comment-container">
                        @foreach($posts as $post)
                            @include('main.community.templates.post')
                        @endforeach
                    </div>

                </div>

                <div class="col-md-5" id="affix">
                    <div class="member-container">
                        <p class="title">
                            <span class="">MEMBERS</span>
                            <a class="pull-right" href="{{ auth()->check() ? '/community/forums' : '/auth/login' }}" target="_blank">FORUM</a>
                        </p>
                        <div class="inner-addon left-addon">
                            <i class="glyphicon glyphicon-search"></i>
                            <input type="text" class="form-control" placeholder="Search" />
                        </div>
                        <div class="follow">
                            <div class="row">
                                @foreach($users as $user)
                                    @include('main.community.templates.users')
                                @endforeach
                            </div>
                        </div>

                        <div class="ads">
                            <div class="well">
                                <p>
                                    Make YOU viral. Join our Premium Listing for $1.99 cents a month. <a href="/careconnect/create-doctor?premium=1" class="btn-link">Click here.</a>
                                </p>
                            </div>
                            <div class="well">
                                <p class="text-center">
                                    PLACE YOUR ADS HERE
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/assets/js/dropzone.min.js"></script>
    <script src="/assets/js/sidebar.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
    Dropzone.autoDiscover = false;
    var pusher = new Pusher('{{ config("services.pusher.app_key") }}');
    </script>
    <script src="/assets/js/timeline.js"></script>
    <script src="/assets/js/notify.js"></script>
    <script src="/assets/js/wall.js"></script>
    <script type="text/javascript">
    $(function() {
        sidebar.init();
        timeline.$template = $('.post-template > .post-wrapper');
        timeline.$replyTemplate = $('.timeline-reply-template > .reply-box');
        wall.init();
    });
    </script>
@endsection
