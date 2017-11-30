@extends('profile.base')

@push('styles')
    <link rel="stylesheet" href="/css/leaderboard.css">
@endpush

@section('content.inner')
<div id="leaderboards">
    <div class="row">
        <div class="col-md-12">
            <h4 class="title">
                <span>Patient Leaderboards</span>
            </h4>

            <div class="card-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>RANK</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4>USER</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>CP POINTS</h4>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <!-- {{ $i = 1 }} -->
                        <?php $i = 1; ?>
                        @if($patients->count() > 0)
                            @foreach ($patients as $patient)
                                <div class="card-template">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <h5>{{ $i++ }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="name">
                                            <img class="user_pic" src="{{ $patient->avatar_path }}">
                                            {{ ucwords($patient->full_name) }}</h5>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h5>{{ $patient->total_points }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5>No one in leaderboard.</h5>
                        @endif
                    </div>
                </div>
                
            </div>




       

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h4 class="title">
                <span>Provider Leaderboard</span>
            </h4>

            <div class="card-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <h4>RANK</h4>
                                </div>
                                <div class="col-md-6">
                                    <h4>USER</h4>
                                </div>
                                <div class="col-md-4">
                                    <h4>CP POINTS</h4>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <?php $p = 1; ?>
                        @if($providers->count() > 0)
                            @foreach ($providers as $provider)
                                <div class="card-template">
                                    <div class="row">
                                        <div class="col-md-2 text-center">
                                            <h5>{{ $p++ }}</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="name">
                                            <img class="user_pic" src="{{ $provider->avatar_path }}">
                                            {{ $provider->full_name }}</h5>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <h5>{{ $provider->total_points }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5>No one in leaderboard.</h5>
                        @endif
                    </div>
                </div>
                
            </div>

            
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="/js/medical.js"></script>
@endpush
