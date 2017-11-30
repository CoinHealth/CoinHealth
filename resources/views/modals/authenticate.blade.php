<div class="modal fade" id="modal-authenticate" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-pl" role="document">
        <button type="button" class="btn btn-default close-btn" data-dismiss="modal">&#215;</button>
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 col-md-push-1">
                        <form method='post' action='/api/auth/login' class="login-form">
                            <p>Please log-in to continue action ..</p>
            				<input type='hidden' name='_token' value='{{ csrf_token() }}' />
            				<div class='form-group'>
            					<div class="input-group" style="width: auto;">
            						<label for='username' class="input-group-addon">
            							<img class='' src='/assets/icons/addon-user.png' />
            						</label>
            						<input required type='text' name='username' id='username' class='form-control text-center' placeholder="{!! trans('auth.username') !!}" />
            					</div>
            				</div>
            				<div class='form-group'>
            					<div class="input-group">
            						<label for='password' class="input-group-addon">
            							<img class='' src='/assets/icons/addon-lock.png' />
            						</label>
            						<input required type='password' name='password' id='password' class='form-control text-center' placeholder="{!! trans('auth.password') !!}" />
            					</div>
            				</div>
            				<div class="form-group text-left">
            					<label for="remember_me">
            						<input type="checkbox" name="remember_me" id="remember_me"> {!! trans('auth.keep-logged') !!}
            					</label>
                                <div class="pull-right">
                                    <a href="/auth/forgot-password" class="btn-link">
                                        {!! trans('auth.forgot-pass') !!}
                                    </a>
                                    |
                                    <a href="/auth/register" class="btn-link">
                                        Register
                                    </a>
                                </div>
            				</div>
            				<hr />
                            <div class="alert alert-danger alert-dismissible" role="alert" style="display:none;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul class="error-list">
                                </ul>
                            </div>
            				<button type="submit" class='btn btn-block btn-submit'>{!! trans('auth.sub-log-in') !!}</button>
            			</form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
