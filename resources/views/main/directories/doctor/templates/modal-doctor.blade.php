<div class="modal fade" tabindex="-1" role="dialog" id="modal-doctor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Doctor Information</h4>
            </div>
            {{-- <form action="/directory/doctors" method="post"> --}}
                <div class="modal-body">
                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="provider_id"> --}}

                    <h4 class="name"></h4>
                    <ul class="specialties"></ul>
                    <div class="address-row"></div>
                    <div class="doctor-address-template" style="display:none;">
                        <p class="address"></p>
                        <p class="phone"></p>
                        <hr>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    @if(auth()->user() )
                        @if(auth()->user()->purpose == 1)
                            {{-- if not yet saved on users directory --}}
                            <button type="submit" data-dismiss="modal" data-toggle="modal" data-target="#modal-save" class="btn btn-primary btnSave">Save</button>
                        @elseif(auth()->user()->purpose == 2)
                            {{-- and if claimed count == 0  --}}
                            <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#modal-save" class="btn btn-primary btnSave">Claim</button>
                        @endif
                    @endif
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
