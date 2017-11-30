<div class='profile-head text-center row'>
	<div class='profile-inner col-md-12'>
		<div class='col-md-4 col-xs-12 col-md-offset-4'>
			<div class='profile-picture'>
				<span class='small pull-right'>Lv. 1</span>
				<div class='img' style='background-image: url( {{ $user->avatar_path }} );'>
					<form action='/profile/avatar' method='POST' enctype="multipart/form-data" id='avatar-uploader-form'>
                    	<input type='hidden' name='_token' value='{{ csrf_token() }}' />
						<input type="file" id="avatar" class="hidden" name="avatar" accept="image/*">
						<p class='small change-picture'><label for='avatar'>Change Picture</label></p>
					</form>
				</div>
				<div class='details'>
					<!-- <img src='/assets/icons/logo.png' class='cp-logo'> -->
					<span class='profile-name'>
						{{ $user->name ? $user->name : $user->username }}
					</span>
					<p class='profile-address'>
						RockVille, SC
					</p>
				</div>
			</div>			
		</div>
	</div>
</div>