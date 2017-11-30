@extends('profile.base')

@push('styles')
    <link rel="stylesheet" href="/css/coverage-new.css">
@endpush

@section('content.inner')
<div id="coverage"  class="parent">
    <div class="row">
        <div class="col-md-12">
            <span class="subcategory">
                Coverage
            </span>
            <span>
                <a href="javascript:void(0);"
                    @click.prevent="editMode = true"
                    v-if="!editMode"
                    v-cloak
                    class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i> Update
                </a>

                <a href="javascript:void(0);"
                    @click.prevent="save"
                    v-if="editMode"
                    v-cloak
                    class="btn btn-primary btn-xs">
                    <i class="fa fa-floppy-o"></i> Save
                </a>
                <a href="javascript:void(0);"
                    @click.prevent="editMode = false"
                    v-if="editMode"
                    v-cloak
                    class="btn btn-primary btn-xs">
                    <i class="fa fa-ban"></i> Cancel
                </a>
            </span>
        </div>
    </div>
    <div class="top-content" v-cloak>
		@include('profile.coverage.forms.cp')
        <hr>
        @include('profile.coverage.forms.insurance')
	</div>

    <notifications :speed="200"
        position="left bottom"
        :duration="5000"/>
</div>
@endsection

@push('scripts')
    <script src="/js/coverage-new.js"></script>
@endpush
