var overview =  {
	init: function() {
		var self= this;
		self.followUser();
		self.thankUser();
	},

	followUser: function() {
		var start = function() {
			$enable= $('.follow').attr('data-enable');
			$('.follow').empty();
			if ($enable == "false") {
				$('<a id="btnFollow" role="button" class="btn-orange btn-block btn-sm" ><i class="fa fa-minus text-left" aria-hidden="true"> </i> Unfollow</a>').appendTo('.follow');
				$('.follow').on('click', unfollow);
			} else {
				$('<a id="btnFollow" role="button" class="btn-orange btn-block btn-sm" ><i class="fa fa-plus text-left" aria-hidden="true"> </i> Follow</a>').appendTo('.follow');
				$('.follow').on('click', follow);
			}
		},
		follow = function() {
			var id= $('[name="userID"]').val();
			$.post('/profile/overview/' + id + '/follow', {
	      _token: csrf_token,
	   		followingID: id,
	    }).done(done);

			$.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/profile/overview/' + id ,
	   		message: 'Followed ',
	   		with_user: id,
	    }).done();
		},
		unfollow = function() {
			var id= $('[name="userID"]').val();
			$.post('/profile/overview/' + id +'/unfollow', {
	      _token: csrf_token,
	   		followingID: id,
	    }).done(done);

	    $.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/profile/overview/' + id ,
	   		message: 'Unfollowed ',
	   		with_user: id,
	    }).done();
		},
		done = function(data) {
			$('.follow-modal').modal('show').on('shown.bs.modal', function() {
				console.log(data.followed_message);
				$(this).find('.follow-message').text(data.followed_message);
				setTimeout(function() {
					window.location.reload();
				}, 2000)
			});

		};
		start();
	},


	thankUser: function() {
		var start = function() {
			$('.thanks').on('click', giveThanks);
		},
		giveThanks = function() {
			$('#thankyouModal').modal('toggle', setTimeout(function() {
					  $('#thankyouModal').modal('toggle');
					}, 2000) );
			var id= $('[name="userID"]').val();
			$.post('/profile/overview/' + id +'/thankyou', {
	      _token: csrf_token,
	   		receiverID: id,
	    }).done(done);

	    $.post('/activity', {
	      _token: csrf_token,
	   		from_url: '/profile/overview/' + id ,
	   		message: 'Sent an appreciation to ',
	   		with_user: id,
	    }).done(done);

		},
		done = function(data) {

		};
		start();
	},
};
