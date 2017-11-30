@extends('messages.base')
@push('styles')
    <link rel="stylesheet" href="/css/messages.css">
@endpush

@section('content.inner')
    <div id="messages" v-cloak class="col-md-12">
        <input type="hidden" 
            id="chat_id" 
            value="{{ isset($chat) ? $chat->id : '' }}">
        <permission-request-form v-if="isProvider && participantsHasPatient"
            v-on:permission-requested="permissionRequested"
            :patient-id="patientInfo.url_id">
        </permission-request-form>
        <div class="row message-heading">
            @include('messages.partials.header')
        </div>
        <div class="row messages-container">
            <transition name="popup">
                @include('messages.partials.pane-conversation')
            </transition>

            <transition name="popup">
                @include('messages.partials.pane-messages')
            </transition>
            <transition name="popup">
                @include('messages.partials.pane-files')
            </transition>
        </div>
        <notifications :speed="200"
            position="left bottom"
            :duration="5000"/>
    </div>
@endsection

@push('scripts')
    <script src="/js/messages.js"></script>
@endpush
